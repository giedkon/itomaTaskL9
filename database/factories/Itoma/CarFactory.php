<?php

namespace Database\Factories\Itoma;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Itoma\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number' => fake()->text(20),
            'year_made' => fake()->year(),
            'model' => fake()->text(50),
            'price' => fake()->randomFloat(50, 500)
        ];
    }
}
