<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@cazh.id',
            'email_verified_at' => now(),
            'password' => Hash::make('cazhsales2023'),
            'phone' => '082145262646',
            'type' => 'ADMINISTRATOR',
        ]);
    }
}
