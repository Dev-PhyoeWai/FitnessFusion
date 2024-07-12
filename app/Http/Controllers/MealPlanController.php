<?php
namespace App\Http\Controllers;

use App\Models\MealPlan;
use Illuminate\Http\Request;

class MealPlanController extends Controller
{
    public function index()
    {
        $mealPlans = MealPlan::all();
        return view('meal_plans.index', compact('mealPlans'));
    }

    public function create()
    {
        $subscriptions = \App\Models\Subscription::all();
        return view('meal_plans.create', compact('subscriptions'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'subscription_id' => 'required',
            'ingredient' => 'required',
            'calories' => 'required',
            'type' => 'required',
            'image' => 'required|image',
        ]);

        $data['image'] = $request->file('image')->store('public/uploads');

        MealPlan::create($data);

        return redirect()->route('meal_plans.index');
    }

    public function show(MealPlan $mealPlan)
    {
        return view('meal_plans.show', compact('mealPlan'));
    }

    public function edit(MealPlan $mealPlan)
    {
        return view('meal_plans.edit', compact('mealPlan'));
    }

    public function update(Request $request, MealPlan $mealPlan)
    {
        $data = $request->validate([
            'subscription_id' => 'required',
            'ingredient' => 'required',
            'calories' => 'required',
            'type' => 'required',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('public/uploads');
        } else {
            unset($data['image']);
        }

        $mealPlan->update($data);

        return redirect()->route('meal_plans.index');
    }

    public function destroy(MealPlan $mealPlan)
    {
        $mealPlan->delete();
        return redirect()->route('meal_plans.index');
    }
}
