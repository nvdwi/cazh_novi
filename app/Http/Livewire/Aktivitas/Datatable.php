<?php

namespace App\Http\Livewire\Aktivitas;

use App\Exports\ActivityExport;
use App\Http\Livewire\Partner\Detail\Activity;
use App\Traits\RappasoftFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Datatable extends DataTableComponent
{
    use RappasoftFilter;

    public string $defaultSortColumn = 'activities.id';

    public string $defaultSortDirection = 'desc';

    public bool $perPageAll = true;

    protected $listeners = [
        're_render_table',
    ];

    public function re_render_table()
    {
        $this->render();
    }

    public function columns(): array
    {
        return [
            Column::make('Sales', 'sales.name')->sortable()->searchable(),
            Column::make('Partner', 'partner.name')->sortable()->searchable(),
            Column::make('Tanggal', 'activity_date')->sortable()->searchable(),
            Column::make('Status Kunjungan', 'status.name')->sortable()->searchable(),
            Column::make('Nominal', 'nominal')->sortable()->searchable(),
            Column::make('Keterangan', 'notes')->sortable()->searchable(),
            Column::make('Foto', 'images')->sortable()->searchable(),
            Column::make('Aksi'),
        ];
    }

    public function query(): Builder
    {
        $user = auth()->user();
        $query = \App\Models\Activity::query()->with('partner', 'status', 'sales');

        if ($user->type != 'ADMINISTRATOR') {
            if ($user->type == 'MANAGER') {
                $sales = $user->sales();
                $sales[] = $user->id;
                $query->whereHas('partner', function ($q) use ($sales) {
                    return $q->whereIn('created_by', $sales);
                });
            } else {
                $query->where('created_by', $user->id);
            }
        }

        return $query;
    }

    public function rowView(): string
    {
        return 'aktivitas.table';
    }

    public function exportToExcel()
    {
        $query = \App\Models\Activity::query()
            ->leftJoin('users', 'users.id','=','activities.created_by')
            ->leftJoin('partners', 'partners.id','=','activities.partner_id')
            ->leftJoin('statuses','statuses.id','=','activities.status_id');

        if(auth()->user()->type=='SALES'){
            $query->where('activities.created_by','=',auth()->user()->id);
        }
        $query->select(DB::raw('COALESCE(users.name) as users_name'),DB::raw('COALESCE(partners.name) as partners_name'),
            DB::raw('COALESCE(statuses.name) as statues_name'),
            'nominal','notes','activities.created_at');
        $query = $this->applySearchFilter($query);
        $query = $this->applySorting($query);

        $data = $query->get();

        return Excel::download(new ActivityExport($data), 'ActivityData' . '_' .  date('Y-m-d'). '_' .now()->toTimeString().'.xls');
    }
}
