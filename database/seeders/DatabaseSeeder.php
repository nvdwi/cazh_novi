<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laravolt\Indonesia\Seeds\DatabaseSeeder as LaravoltSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
        ]);
    }
}
