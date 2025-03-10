<?php

namespace Database\Seeders;

use App\Models\WorkoutPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WorkoutPlan::factory()->count(120)->create();
    }
}
