<?php

namespace App\Http\Controllers;

use App\Models\MealPlan;
use App\Models\Subscription;
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
        $subscriptions = Subscription::all(); // Fetch all subscriptions
        return view('meal_plans.create', compact('subscriptions'));
    }

    public function store(Request $request)
    {
        MealPlan::create($request->all());
        return redirect()->route('meal_plans.index');
    }

    public function show(MealPlan $mealPlan)
    {
        return view('meal_plans.show', compact('mealPlan'));
    }

    public function edit(MealPlan $mealPlan)
    {
        $subscriptions = Subscription::all();
        return view('meal_plans.edit', compact('mealPlan',
        'subscriptions'));
    }

    public function update(Request $request, MealPlan $mealPlan)
    {
        $mealPlan->update($request->all());
        return redirect()->route('meal_plans.index');
    }

    public function destroy(MealPlan $mealPlan)
    {
        $mealPlan->delete();
        return redirect()->route('meal_plans.index');
    }
}
