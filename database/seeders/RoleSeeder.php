<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => "Admin",
            'roles' => json_encode("1")
        ]);

        DB::table('roles')->insert([
            'name' => "Manager",
            'roles' => json_encode("1")
        ]);

        DB::table('roles')->insert([
            'name' => "Sales",
            'roles' => json_encode("1")
        ]);
    }
}
