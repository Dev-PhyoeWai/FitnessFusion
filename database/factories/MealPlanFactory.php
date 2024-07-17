<?php

namespace Database\Factories;

use App\Models\MealPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealPlanFactory extends Factory
{
    protected $model = MealPlan::class;

    public function definition(): array
    {

        return [
            'name' => $this->getName(),
            'ingredient' => $this -> getIngredients(),
            'type' => $this -> getType(),
            'calories' => $this -> getCalories(),

        ];
    }

    private function getName()
    {
        $names = [
            'Keto pancakes with berries and whipped cream',
            'Keto carbonara with zoodles',
            'Keto egg muffins',
            'Keto chicken burger with jalapeño aioli',
            'Crispy keto tuna burgers',
            'Italian keto meatballs with mozzarella cheese',
            'BLTA lettuce wraps',
            'Veggie keto scramble',
            'Jill’s cheese-crusted keto omelet',
            'Asian keto chicken stir-fry with broccoli'
        ];
        return $names[array_rand($names)];
    }


    private function getIngredients()
    {
        $ingredients = [
            'Pancakes, 4 eggs, cheese, Toopings',
            'whipping cream, bacon, salt and pepper, zucchini and zoodles, egg yolks',
            'scallions, finely chopped, eggs, cooked bacon, red pest',
            'mayonnaise, pickled jalapeños, minced, garlic clove, minced, chicken breasts, butterhead lettuce leaves',
            'canned tuna in water, drained, mayonnaise, large eggs, garlic powder, onion powder, salt, ground black pepper',
            'ground beef, shredded Parmesan cheese, egg, salt, dried basil, onion powder, garlic powder, fresh mozzarella cheese',
            'bacon in slices, mayonnaise, lettuce, avocado, onion powder, salt, tomaton salt, pepper',
            'butter, egg, red bell peppers, salt and ground black pepper, Parmesan cheese, shredded, scallion, chopped',
            'egg', 'heavy whipping cream, salt and black pepper, butter, shredded cheese, turkey, oregano, mushrooms, baby spinach',
            'boneless chicken thighs, thinly sliced, olive oil or coconut oil, black pepper, garlic powder, broccoli, cut into small pieces, tamari soy sauce, mayonnaise, hot sauce, garlic powder'
        ];
        return $ingredients[array_rand($ingredients)];
    }

    private function getType()
    {
        $types =
            [
                'Weight Loss',
                'Weight Gain'
            ];
        return $types[array_rand($types)];
    }
    private function getCalories(){
        $calories =
        [
            '441 Kcal', '432 Kcal', '165 Kcal', '504 Kcal', '271 Kcal',
            '387 Kcal', '266 Kcal', '200 Kcal', '660 Kcal', '544 Kcal'
        ];
        return $calories[array_rand($calories)];
    }
}
