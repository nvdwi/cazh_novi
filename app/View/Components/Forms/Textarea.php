<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    public string $name;
    public string $model;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $model)
    {
        $this->name = $name;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.forms.textarea');
    }
}
