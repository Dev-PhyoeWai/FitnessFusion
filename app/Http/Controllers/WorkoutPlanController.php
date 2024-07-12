<?php
namespace App\Http\Controllers;

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
        $subscriptions = \App\Models\Subscription::all();
        return view('workout_plans.create', compact('subscriptions'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'subscription_id' => 'required',
            'name' => 'required',
            'body_part' => 'required',
            'type' => 'required',
            'set' => 'required',
            'raps' => 'required',
            'image' => 'required|image',
            'gender' => 'required',
        ]);

        $data['image'] = $request->file('image')->store('public/uploads');

        WorkoutPlan::create($data);

        return redirect()->route('workout_plans.index');
    }

    public function show(WorkoutPlan $workoutPlan)
    {
        return view('workout_plans.show', compact('workoutPlan'));
    }


    public function edit(WorkoutPlan $workoutPlan)
    {
        return view('workout_plans.edit', compact('workoutPlan'));
    }

    public function update(Request $request, WorkoutPlan $workoutPlan)
    {
        $data = $request->validate([
            'subscription_id' => 'required',
            'name' => 'required',
            'body_part' => 'required',
            'type' => 'required',
            'set' => 'required',
            'raps' => 'required',
            'image' => 'nullable|image',
            'gender' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('public/uploads');
        } else {
            unset($data['image']);
        }

        $workoutPlan->update($data);

        return redirect()->route('workout_plans.index');
    }

    public function destroy(WorkoutPlan $workoutPlan)
    {
        $workoutPlan->delete();
        return redirect()->route('workout_plans.index');
    }
}
