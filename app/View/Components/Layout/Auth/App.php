<?php

namespace App\View\Components\Layout\Auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class App extends Component
{
    public string $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.layout.auth.app');
    }
}
