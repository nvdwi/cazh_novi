<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class File extends Component
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.file');
    }
}
