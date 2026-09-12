<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        Role::create([
            'name'=>'admin_level_1'
        ]);


        Role::create([
            'name'=>'admin_level_2'
        ]);


        $this->call([
            AdminSeeder::class,
        ]);

    }
}
