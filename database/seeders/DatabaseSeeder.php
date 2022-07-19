<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            DepartmentSeeder::class,
            StatusSeeder::class,
            CarSeeder::class,
            //CarStatusSeeder::class,
            //CarManagementSeeder::class
        ]);
    }
}
