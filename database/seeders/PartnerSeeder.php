<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partner::create([
            'name'=> 'Partner',
            'category_id'=> '1',
            'pic'=> 'Pemilik',
            'area_id'=>'1',
            'address'=>'random alamat',
            'pic_phone'=> '08123232322',
            'manager_id'=>2,
            'sales_id'=>3
        ]);
    }
}
