<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Row extends Component
{
    public $primaryKey, $row;

    public function __construct($primaryKey, $rowData)
    {
        $this->primaryKey = $primaryKey;
        $this->row = $rowData;
    }

    public function render()
    {
        return view('components.table.row');
    }
}