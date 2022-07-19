<?php

namespace Database\Factories\Itoma;

use App\Models\Itoma\Car;
use App\Models\Itoma\CarManagement;
use App\Models\Itoma\Department;
use App\Models\Itoma\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Itoma\CarManagement>
 */
class CarManagementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $coinflip = mt_rand(0, 1);

        if ($coinflip) {
            $userId = User::inRandomOrder()->limit(1)->first()->id;
        } else {
            $departmentId = Department::inRandomOrder()->limit(1)->first()->id;
        }

        return [
            'department_id' => (isset($departmentId)) ? $departmentId : null,
            'user_id' => (isset($userId)) ? $userId : null,
        ];
    }
}
