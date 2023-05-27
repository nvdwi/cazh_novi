<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class Submit extends Component
{
    public string $target;

    public string $label;

    public string $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($target, $label, $icon = 'la-save')
    {
        $this->target = $target;
        $this->label = $label;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.submit');
    }
}
