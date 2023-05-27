<?php

namespace App\View\Components\Layout\Main;

use Illuminate\View\Component;

class Seo extends Component
{
    public string $title;
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.main.seo');
    }
}
