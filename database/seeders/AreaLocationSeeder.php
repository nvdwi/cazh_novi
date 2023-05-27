<?php

namespace Database\Seeders;

use App\Models\AreaLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AreaLocation::create([
            "name" => "Random Loc",
            "province_code" => "11",
            "city_code" => "1101",
            "district_code" => "1101010",
            "village_code" => "1101010001",
        ]);
    }
}
