<?php

namespace App\Http\Livewire\Home;


use Livewire\Component;
use App\Models\User;
use App\Models\Activity;
use App\Models\Partner;
use App\Models\Status;
use App\Models\Category;


class Box extends Component
{

    public $data =[];

    public function mount(){
        $id = auth()->user()->id;
        if(auth()->user()->type == "MANAGER"){
            $this->data = [
                'Sales' => User::query()
                    ->where('type','=','SALES')
                    ->where('manager_id','=',$id)
                    ->count(),
                'Aktivitas' => Activity::query()
                    ->leftJoin('users','users.id','=','activities.created_by')
                    ->where('users.type','=','SALES')
                    ->where('manager_id','=',$id)
                    ->count(),
                'Partner' => Partner::query()
                    ->leftJoin('users','users.id','=','partners.created_by')
                    ->where('users.type','=','SALES')
                    ->where('manager_id','=',$id)
                    ->count()
            ];
        }elseif (auth()->user()->type == "SALES"){
            $this->data = [
                'Partner' => Partner::query()
                    ->where('created_by','=',$id)
                    ->count(),
                'Aktivitas' => Activity::query()
                    ->where('created_by','=',$id)
                    ->count(),
            ];
        }else{
            $this->data = [
                'Manager' => User::query()->where('type','=','MANAGER')->count(),
                'Sales' => User::query()->where('type','=','SALES')->count(),
                'Kategori' => Category::query()->count(),
                'Status' => Status::query()->count(),
                'Aktivitas' => Activity::query()->count(),
                'Partner' => Partner::query()->count()
            ];
        }
    }
    public function render()
    {
        return view('home.box');
    }
}
