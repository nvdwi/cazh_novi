<?php

namespace App\View\Components\Layout\Main;

use Illuminate\View\Component;

class App extends Component
{
    public string $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('components.layout.main.app');
    }
}
