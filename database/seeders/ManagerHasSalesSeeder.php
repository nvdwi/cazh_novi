<?php

namespace Database\Seeders;

use App\Models\ManagerHasSales;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManagerHasSalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ManagerHasSales::create([
            'manager_id'=> 2,
            'sales_id'=>3,
        ]);
    }
}
