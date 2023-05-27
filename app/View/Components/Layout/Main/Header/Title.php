<?php

namespace App\View\Components\Layout\Main\Header;

use Illuminate\View\Component;

class Title extends Component
{
    public string $title;
    public function __construct($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('components.layout.main.header.title');
    }
}
