<?php

namespace Database\Factories\Itoma;

use App\Models\Itoma\Car;
use App\Models\Itoma\CarStatus;
use App\Models\Itoma\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Itoma\CarStatus>
 */
class CarStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Increment dates by CarStatus amount
        $count = count(CarStatus::get()) - 10;
     
        return [
            'status_id' => Status::inRandomOrder()->limit(1)->first()->id,
            'date_from' => Carbon::now()->subWeek($count + 1),
            'date_to' => Carbon::now()->subWeek($count),
        ];
    }
}
