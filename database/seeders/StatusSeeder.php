<?php

namespace Database\Seeders;

use App\Models\Itoma\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::factory()
        ->count(20)
        ->create();
    }
}
