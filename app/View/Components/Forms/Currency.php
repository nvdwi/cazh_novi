<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Currency extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $allow_minus = false;

    public function __construct($allowMinus = false)
    {
        $this->allow_minus = $allowMinus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.forms.currency', [
            'allow_minus' => $this->allow_minus,
        ]);
    }
}
