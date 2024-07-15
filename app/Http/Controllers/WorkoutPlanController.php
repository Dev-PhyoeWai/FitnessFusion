<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\WorkoutPlan;
use Illuminate\Http\Request;

class WorkoutPlanController extends Controller
{
    public function index()
    {
        $workoutPlans = WorkoutPlan::all();
        return view('workout_plans.index', compact('workoutPlans'));
    }

    public function create()
    {
        $subscriptions = Subscription::all(); // Fetch all subscriptions
        return view('workout_plans.create', compact('subscriptions'));
    }

    public function store(Request $request)
    {
        WorkoutPlan::create($request->all());
        return redirect()->route('workout_plans.index');
    }

    public function show(WorkoutPlan $workoutPlan)
    {
        return view('workout_plans.show', compact('workoutPlan'));
    }

    public function edit(WorkoutPlan $workoutPlan)
    {
        $subscriptions = Subscription::all();
        return view('workout_plans.edit', compact('workoutPlan',
            'subscriptions'));
    }

    public function update(Request $request, WorkoutPlan $workoutPlan)
    {
        $workoutPlan->update($request->all());
        return redirect()->route('workout_plans.index');
    }

    public function destroy(WorkoutPlan $workoutPlan)
    {
        $workoutPlan->delete();
        return redirect()->route('workout_plans.index');
    }
}
