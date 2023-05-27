<?php

namespace App\Http\Livewire\Setting\Status;

use App\Models\Status;
use App\Traits\RappasoftFilter;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Datatable extends DataTableComponent
{
    use RappasoftFilter;

    public string $defaultSortColumn = 'id';

    public string $defaultSortDirection = 'desc';

    public bool $perPageAll = true;

    protected $listeners = [
        're_render_table',
    ];

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable()->searchable(),
            Column::make('Name', 'name')->sortable()->searchable(),
            Column::make('Aksi'),
        ];
    }

    public function re_render_table()
    {
        return $this->render();
    }

    public function query(): Builder
    {
        return Status::query();
    }

    public function rowView(): string
    {
        return 'setting.status.table';
    }
}
