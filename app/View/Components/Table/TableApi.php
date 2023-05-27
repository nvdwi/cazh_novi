<?php

namespace App\View\Components\Table;

use App\Utilities\Constant;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class TableApi extends Component
{
    public $isSearch;
    public $isBulkAction;
    public $primaryKey;
    public $rowView;
    public $targetLoading;
    public $searchLabel;

    public function __construct($isSearch = true, $isBulkAction = false, $targetLoading = '', $searchLabel = '')
    {
        $this->isSearch = $isSearch;
        $this->isBulkAction = $isBulkAction;
        $this->targetLoading = $targetLoading;
        $this->searchLabel = $searchLabel;
    }

    public function render()
    {
        return view('components.table.table-api');
    }


}
