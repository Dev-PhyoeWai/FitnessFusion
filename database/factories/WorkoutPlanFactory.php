<?php

namespace Database\Factories;

use App\Models\WorkoutPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkoutPlanFactory extends Factory
{
    protected $workout = WorkoutPlan::class;

    public function definition(): array
    {
        return [
            'name' => $this->getName(),
            'body_part' => $this -> getBodyPart(),
            'type' => $this -> getType(),
            'set' => $this -> getSet(),
            'raps' => $this -> getRaps(),
            'gender' => $this -> getGender(),
        ];
    }

        private function getName()
        {
            $names = [
                'Squat', 'Row', 'Dumbbell Pullover', 'Bench Press', 'Leg Press',
                'Jumping Jack','High kness', 'Burpees', 'Box Jumps'
            ];
            return $names[array_rand($names)];
        }

        private function getBodyPart()
        {
            $bodyPart = [
                'Upper Body', 'Lower Body', 'Core'
            ];
            return $bodyPart[array_rand($bodyPart)];
        }

        private function getType()
        {
            $types = [
                'Weight Loss', 'Weight Gain'
            ];
            return $types[array_rand($types)];
        }


        private function getSet()
        {
            $sets = [
                '3', '4'
            ];
            return $sets[array_rand($sets)];
        }

        private function getRaps()
        {
            $raps = [
                '10', '12', '15', '20'
            ];
            return $raps[array_rand($raps)];
        }

        private function getGender()
        {
            $gender = [
                'Male', 'Female'
            ];
            return $gender[array_rand($gender)];
        }
}
