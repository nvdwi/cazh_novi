<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;

class Index extends Component
{
    public $tabList = [
        'Kategori',
        'Status Kunjungan',
    ];

    public $tab = 'Kategori';

    protected $queryString = ['tab'];

    public function render()
    {
        return view('setting.index')->layoutData([
            'title' => 'Pengaturan',
        ]);
    }
}
