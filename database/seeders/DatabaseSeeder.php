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
            // Seed departments, users & statuses first so they can be used in CarStatus & CarManagement
            DepartmentSeeder::class,
            StatusSeeder::class,
            // Seed Car, CarStatus & CarManagement models with relationships
            CarSeeder::class,
        ]);
    }
}
