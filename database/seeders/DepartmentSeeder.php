<?php

namespace Database\Seeders;

use App\Models\Itoma\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Itoma\User;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::factory()
        ->count(50)
        ->has(User::factory()->count(random_int(0, 50), 'users'))
        ->create();
    }
}
