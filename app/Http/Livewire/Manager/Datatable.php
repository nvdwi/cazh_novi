<?php

namespace App\Http\Livewire\Manager;

use App\Exports\ManagersExport;
use App\Models\User;
use App\Traits\RappasoftFilter;
use Illuminate\Database\Eloquent\Builder;
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
            Column::make('Nama', 'name')->sortable()->searchable(),
            Column::make('Email', 'email')->sortable()->searchable(),
            Column::make('No HP', 'phone')->sortable()->searchable(),
            Column::make('Aksi'),
        ];
    }



    public function query(): Builder
    {
        return User::query()->where('type', 'MANAGER');
    }

    public function rowView(): string
    {
        return 'manager.table';
    }

    public function exportToExcel()
    {
        $query = $this->query();
        $query = $this->applySearchFilter($query);
        $query = $this->applySorting($query);
        $query->select('id','name','phone','email','created_at');
        $data = $query->get();

        return Excel::download(new ManagersExport($data), 'ManagerData' . '_' .  date('Y-m-d'). '_' .now()->toTimeString().'.xls');
    }

    public function re_render_table()
    {
        return $this->render();
    }
}
