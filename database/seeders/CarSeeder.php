<?php

namespace Database\Seeders;

use App\Models\Itoma\Car;
use App\Models\Itoma\CarManagement;
use App\Models\Itoma\CarStatus;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countCars = 10;
        $countStatusForCars = 20;
        $countManagementForCars = 20;

        Car::factory()
            ->count($countCars)
            ->has(CarStatus::factory()
                ->count($countStatusForCars)
                ->sequence(fn ($sequence) => [
                    'cars_id' => $sequence->index,
                    'date_from' => Carbon::now()->addMonth(2)->subWeek($sequence->index - ($countStatusForCars * (count(Car::get()) - 1))),
                    'date_to' => Carbon::now()->addMonth(2)->subWeek(($sequence->index - 1)  - ($countStatusForCars * (count(Car::get()) - 1)))
                ]))
            ->has(CarManagement::factory()
                ->count($countManagementForCars)
                ->sequence(fn ($sequence) => [
                    'cars_id' => $sequence->index,
                    'date_from' => Carbon::now()->addMonth(2)->subWeek($sequence->index - ($countStatusForCars * (count(Car::get()) - 1))),
                    'date_to' => Carbon::now()->addMonth(2)->subWeek(($sequence->index - 1)  - ($countStatusForCars * (count(Car::get()) - 1)))
                ]))
            ->create();
    }
}
