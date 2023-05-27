<?php

namespace App\Http\Livewire\Partner\Detail;

use App\Exports\PartnerActivityExport;
use App\Traits\RappasoftFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ActivityDatatable extends DataTableComponent
{
    use RappasoftFilter;

    public $partner_id;

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
            Column::make('Tanggal', 'activity_date')->sortable()->searchable(),
            Column::make('Status Kunjungan', 'category.name')->sortable()->searchable(),
            Column::make('Nominal', 'nominal')->sortable()->searchable(),
            Column::make('Keterangan', 'notes')->sortable()->searchable(),
            Column::make('Foto', 'images')->sortable()->searchable(),
            Column::make('Aksi'),
        ];
    }

    public function query(): Builder
    {
        return \App\Models\Activity::query()->where('partner_id', $this->partner_id)->with('status');
    }

    public function rowView(): string
    {
        return 'partner.detail.activity-table';
    }

    public function exportToExcel()
    {
        $query = \App\Models\Activity::query()->where('partner_id',$this->partner_id)
            ->leftJoin('statuses','statuses.id','=','activities.status_id');
        $query = $this->applySearchFilter($query);
        $query = $this->applySorting($query);

        $query->select('activities.created_at',DB::raw('COALESCE(statuses.name) as manager_name'),'nominal');
        $data = $query->get();

        return Excel::download(new PartnerActivityExport($data), 'SalesData' . '_' .  date('Y-m-d'). '_' .now()->toTimeString().'.xls');
    }
}
