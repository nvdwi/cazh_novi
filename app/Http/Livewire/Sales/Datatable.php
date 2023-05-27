<?php

namespace App\Http\Livewire\Sales;

use App\Exports\SalesExport;
use App\Models\User;
use App\Traits\RappasoftFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
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
            Column::make('Nama Manager', 'manager.name')->hideIf(auth()->user()->type == 'MANAGER')->sortable()->searchable(),
            Column::make('Nama', 'name')->sortable()->searchable(),
            Column::make('Email', 'email')->sortable()->searchable(),
            Column::make('No HP', 'phone')->sortable()->searchable(),
            Column::make('Aksi'),
        ];
    }

    public function re_render_table()
    {
        return $this->render();
    }

    public function query(): Builder
    {
        $query = User::query()
            ->where('type', 'SALES')
            ->with('manager');

        if (auth()->user()->type == 'MANAGER') {
            $query->where('manager_id', auth()->user()->id);
        }

        return $query;
    }

    public function rowView(): string
    {
        return 'sales.table';
    }

    public function exportToExcel()
    {
        $query = User::query()
            ->where('users.type', 'SALES')
            ->leftJoin('users as us2', DB::raw('CAST(users.manager_id AS INTEGER)'), '=', 'us2.id');
        if(auth()->user()->type == "MANAGER"){
            $query->where('us2.id','=',auth()->user()->id);
        }
        $query = $this->applySearchFilter($query);
        $query = $this->applySorting($query);

        $query->select('users.id',DB::raw('COALESCE(us2.name) as manager_name'),'users.name','users.phone','users.email','users.created_at');
        $data = $query->get();

        return Excel::download(new SalesExport($data), 'SalesData' . '_' .  date('Y-m-d'). '_' .now()->toTimeString().'.xls');
    }
}
