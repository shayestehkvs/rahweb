<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {

        $admin1 = User::create([
            'name' => 'Admin Level 1',
            'email' => 'admin1@test.com',
            'password' => Hash::make('password'),
        ]);


        $admin2 = User::create([
            'name' => 'Admin Level 2',
            'email' => 'admin2@test.com',
            'password' => Hash::make('password'),
        ]);


        $admin1->assignRole('admin_level_1');

        $admin2->assignRole('admin_level_2');

    }
}
