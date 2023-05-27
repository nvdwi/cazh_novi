<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class Modal extends Component
{
    public $_id;

    public $title;

    public $form;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $title, $form = null)
    {
        $this->_id = $id;
        $this->title = $title;
        $this->form = $form ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.modal');
    }
}
