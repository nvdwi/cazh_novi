<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\User;
use App\Models\Activity;
use App\Models\Partner;
use App\Models\Status;
use App\Models\Category;

class Index extends Component
{
    public function render()
    {
        return view('home.index')->layoutData([
            'title' => 'Home'
        ]);
    }
}
