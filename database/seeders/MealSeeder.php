<?php

namespace Database\Seeders;

use App\Models\MealPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       MealPlan::factory()->count(7)->create();
    }
}
