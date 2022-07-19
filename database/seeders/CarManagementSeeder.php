<?php

namespace Database\Seeders;

use App\Models\Itoma\CarManagement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            CarManagement::factory()->count(3)->create();
        }
    }
}
