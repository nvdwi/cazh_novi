<?php

namespace App\View\Components\Table;

use App\Utilities\TableTrait;
use Livewire\Component;
use Livewire\WithPagination;

abstract class TableComponent extends Component
{
    use WithPagination, TableTrait;

    public function mount()
    {
        if($this->customPerPage){
            $this->per_page = $this->customPerPage[0] == -1 ? 99999 : $this->customPerPage[0];
        }
        $this->dataApi();
        $this->whileMount();
    }

    public function render()
    {
        //fungsi trait yang dioverride dan dirun SEBELUM render persis
        $this->beforeRender();

        return view($this->tableView())->with([
            'dataPaginate' => $this->dataPaginate(),
            'rowView' => $this->rowView()
        ]);
    }

}
