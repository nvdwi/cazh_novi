<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class SelectInput extends Component
{
    public array $datas;

    public string $name;

    public function __construct(
        $data, $value, $label, $name
    )
    {
        $this->name = $name;
        $this->datas = collect($data)->pluck($label, $value)->toArray();
    }

    public function render()
    {
        return view('components.forms.select-input');
    }
}
