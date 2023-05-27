<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class BulkAction extends Component
{
    public $selectedRowValue;

    public function __construct($selectedRowValue)
    {
        $this->selectedRowValue = $selectedRowValue;
    }

    public function render()
    {
        return view('components.table.bulk-action');
    }
}