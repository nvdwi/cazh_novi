<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class Action extends Component
{

    public $target;
    public $label;

    public function __construct($target, $label)
    {
        $this->target = $target;
        $this->label = $label;
    }

    public function render()
    {
        return view('components.buttons.action');
    }
}
