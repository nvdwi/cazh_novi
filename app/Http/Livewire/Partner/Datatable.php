<?php

namespace App\Http\Livewire\Partner;

use App\Exports\PartnerExport;
use App\Models\Partner;
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

    public $is_manager = false;

    public string $defaultSortColumn = 'partners.id';

    public string $defaultSortDirection = 'desc';

    public bool $perPageAll = true;

    protected $listeners = [
        're_render_table',
    ];

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable()->searchable(),
            Column::make('Nama Sales', 'users.name')
                ->hideIf(auth()->user()->type=="SALES")
                ->sortable()->searchable(),
            Column::make('Nama Partner', 'name')->sortable()->searchable(),
            Column::make('Kategori', 'category_id')->sortable()->searchable(),
            Column::make('Nama PIC', 'pic')->sortable()->searchable(),
            Column::make('Nomor HP PIC', 'pic_phone')->sortable()->searchable(),
            Column::make('alamat', 'address')->sortable()->searchable(),
            Column::make('Aksi'),
        ];
    }

    public function re_render_table()
    {
        return $this->render();
    }

    public function query(): Builder
    {
        $user = auth()->user();
        $this->is_manager = $user->type != 'SALES';

        $query = Partner::query()
            ->with(['users', 'category']);

        if ($user->type != 'ADMINISTRATOR') {
            if ($this->is_manager) {
                $sales = $user->sales();
                $sales[] = $user->id;
                $query->whereIn('created_by', $sales);
            } else {
                $query->where('created_by', $user->id);
            }
        }

        return $query;
    }

    public function exportToExcel()
    {
        $query = Partner::query()
            ->leftJoin('users as u','u.id','=','partners.created_by')
            ->leftJoin('categories as c', 'c.id','=','partners.category_id');
        if(auth()->user()->type=='SALES'){
            $query->where('partners.created_by','=',auth()->user()->id);
        }elseif (auth()->user()->type=='MANAGER'){
            $query->where('partners.created_by','=','u.id');
        }
        $query = $this->applySearchFilter($query);
        $query = $this->applySorting($query);

        $query->select(DB::raw('COALESCE(u.name) as sales_name'),'partners.name',DB::raw('COALESCE(c.name) as categories_name'),'pic','pic_phone','address','partners.created_at');

        $data = $query->get();

        return Excel::download(new PartnerExport($data), 'PartnerData' . '_' .  date('Y-m-d'). '_' .now()->toTimeString().'.xls');
    }

    public function rowView(): string
    {
        return 'partner.table';
    }
}
