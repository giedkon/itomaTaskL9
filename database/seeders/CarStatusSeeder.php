<?php

namespace Database\Seeders;

use App\Models\Itoma\Car;
use App\Models\Itoma\CarStatus;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // CarStatus::factory()
            // ->count(Count(Car::get()))
            // ->sequence(fn ($sequence) => [
            //     'cars_id' => $sequence->index,
            //     'date_from' => Carbon::now()->subWeek($sequence->count + 1),
            //     'date_to' => Carbon::now()->subWeek($sequence->count)
            // ])
            // ->create();
    }
}
