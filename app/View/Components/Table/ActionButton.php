<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class ActionButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $label, $mr, $buttonStyle;
    public function __construct($label = 'Action', $mr = null, $buttonStyle = null)
    {
        $this->label = $label;
        $this->buttonStyle = $buttonStyle;
        if ($mr) {
            $this->mr = $mr.';';
        } else {
            $this->mr = 'right: 15px;';
        }
     }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.action-button');
    }
}
