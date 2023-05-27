<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i=0;
        while ($i<5){
            Category::create([
                "name"=>"Kategori ".$i,
                "descriptions"=>"Kategori ".$i
            ]);
            $i++;
        }
    }
}
