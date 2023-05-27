<?php

namespace App\Http\Livewire\Partner;

use App\Models\Partner;
use Livewire\Component;

class Detail extends Component
{
    public $partner;

    public $mode = 'detail';

    protected $queryString = ['mode'];

    protected $listeners = [
        'refresh',
    ];

    public function mount($id)
    {
        $this->partner = Partner::find($id);
    }

    public function render()
    {
        return view('partner.detail')->layoutData([
            'title' => 'Detail Partner',
        ]);
    }

    public function refresh()
    {
        $this->render();
    }
}
