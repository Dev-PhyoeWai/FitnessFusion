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
            'day' => $this -> getDay(),
            'week' => $this -> getWeek(),
            'status' => $this -> getStatus(),
            'set' => $this -> getSet(),
            'raps' => $this -> getRaps(),
            'gender' => $this -> getGender(),
            'subscription_id' => $this -> getSubId(),
        ];
    }

        private function getName()
        {
            $names = [
                'Box Jumps','Dumbbell Pullover', 'Squat', 'Row',
                'Jumping Jack','High kness',
                'Burpees', 'Bench Press',
                'Leg Press',

            ];
            return $names[array_rand($names)];
        }

        private function getBodyPart()
        {
            $bodyPart = [
                'Lower Body', 'Core','Upper Body'
            ];
            return $bodyPart[array_rand($bodyPart)];
        }

        private function getType()
        {
            $types = [
//                'Weight Gain'
                'Weight Loss'
            ];
            return $types[array_rand($types)];
        }
        private function getDay()
        {
            $day = [
                'Day 1','Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6','Day 7'
            ];
            return $day[array_rand($day)];
        }
        private function getWeek()
        {
            $week = [
                'Week 1', 'Week 2', 'Week 3', 'Week 4'
            ];
            return $week[array_rand($week)];
        }

        private function getStatus()
        {
            $status = [
                '1'
            ];
            return $status[array_rand($status)];
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
        private function getSubId()
        {
            $subscription_id = [
//                '1'
                '2'
            ];
            return $subscription_id[array_rand($subscription_id)];
        }
}
