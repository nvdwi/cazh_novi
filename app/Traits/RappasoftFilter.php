<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;
use Rappasoft\LaravelLivewireTables\Utilities\ColumnUtilities;

trait RappasoftFilter
{
    public function sortBy(string $field): ?string
    {
        if (! $this->sortingEnabled) {
            return null;
        }

        if ($this->singleColumnSorting && count($this->sorts) && ! isset($this->sorts[$field])) {
            $this->sorts = [];
        }

        if (! isset($this->sorts[$field])) {
            $this->sorts = [];

            return $this->sorts[$field] = 'asc';
        }

        if ($this->sorts[$field] === 'asc') {
            $this->sorts = [];

            return $this->sorts[$field] = 'desc';
        }

        unset($this->sorts[$field]);

        return null;
    }

    public function applySorting($query)
    {
        if (! empty($this->defaultSortColumn) && ! count($this->sorts)) {
            return $query->orderBy($this->defaultSortColumn, $this->defaultSortDirection);
        }
        foreach ($this->sorts as $field => $direction) {
            if (! in_array($direction, ['asc', 'desc'])) {
                $direction = 'desc';
            }

            $column = $this->getColumn($field);

            if (is_null($column)) {
                continue;
            }

            $hasRelation = ColumnUtilities::hasRelation($column->column());

            if ($column->hasSortCallback()) {
                $query = app()->call($this->getColumn($field)->getSortCallback(), [
                    'query' => $query,
                    'direction' => $direction,
                ]);
            } else {
                if ($hasRelation) {
                    $masterTable = $query->getModel()->getTable();
                    $relationName = ColumnUtilities::parseRelation($column->column());
                    $fieldName = ColumnUtilities::parseField($column->column());
                    $relation = $query->getModel()->$relationName();
                    $relationTable = $relation->getRelated()->getTable();
                    $query->select($masterTable.'.*')->join(
                        $relationTable, $relation->getQualifiedForeignKeyName(), '=', $relation->getQualifiedOwnerKeyName()
                    )->orderBy($relationName.'.'.$fieldName, $direction);
                } else {
                    $table = $query->getModel()->getTable();
                    $query->orderBy($table.'.'.$field, $direction);
                }
            }
        }

        return $query;
    }

    public function applySearchFilter($query)
    {
        $searchableColumns = $this->getSearchableColumns();

        if ($this->hasFilter('search') && count($searchableColumns)) {
            $search = $this->getFilter('search');

            // Group search conditions together
            $query->where(function (Builder $subQuery) use ($search, $query, $searchableColumns) {
                foreach ($searchableColumns as $column) {
                    // Does this column have an alias or relation?
                    $hasRelation = ColumnUtilities::hasRelation($column->column());

                    // Let's try to map this column to a selected column
                    $selectedColumn = ColumnUtilities::mapToSelected($column->column(), $query);

                    // If the column has a search callback, just use that
                    if ($column->hasSearchCallback()) {
                        // Call the callback
                        ($column->getSearchCallback())($subQuery, $search);
                    } elseif (! $hasRelation || $selectedColumn) { // If the column isn't a relation or if it was previously selected
                        $whereColumn = $selectedColumn ?? $column->column();

                        // TODO: Skip Aggregates
                        if (! $hasRelation) {
                            $whereColumn = Schema::hasColumn($query->getModel()->getTable(), $whereColumn) ? $query->getModel()->getTable().'.'.$whereColumn : $whereColumn;
                        }

                        // We can use a simple where clause
                        $subQuery->orWhere($whereColumn, 'ilike', '%'.$search.'%');
                    } else {
                        // Parse the column
                        $relationName = ColumnUtilities::parseRelation($column->column());
                        $fieldName = ColumnUtilities::parseField($column->column());

                        // We use whereHas which can work with unselected relations
                        $subQuery->orWhereHas($relationName, function (Builder $hasQuery) use ($fieldName, $search) {
                            $hasQuery->where($fieldName, 'ilike', '%'.$search.'%');
                        });
                    }
                }
            });
        }

        return $query;
    }
}
