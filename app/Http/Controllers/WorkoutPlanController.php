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
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'body_part' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'set' => 'required|integer',
            'raps' => 'required|integer',
            'gender' => 'required|string|max:255',
            'subscription_id' => 'required|integer|exists:subscriptions,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $filename = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('uploads/images/'), $filename);
            $imagePath = 'uploads/images/' . $filename; // Save the relative path
        }
        // Merge image path with the other request data
        $data = $request->all();
        $data['image'] = $imagePath;

        // Create the workout plan
        WorkoutPlan::create($data);
        // Redirect to the index route
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

    public function update(Request $request, $id)
    {
        $workoutPlan = WorkoutPlan::findOrFail($id);

        if ($request->hasFile('image')) {

            // Delete old image if it exists
            if ($workoutPlan->image && file_exists(public_path($workoutPlan->image))) {
                unlink(public_path($workoutPlan->image));
            }

            $imagePath = $request->file('image');
            $filename = time() . '.' . $imagePath->getClientOriginalExtension();
            $imagePath->move('uploads/images/', $filename);
            $workoutPlan->image = 'uploads/images/' . $filename;
        }

        $workoutPlan->update($request->except('image'));

        return redirect()->route('workout_plans.index');
    }

    public function destroy($id)
    {
        $workoutPlan = WorkoutPlan::findOrFail($id);
        // Delete the image if it exists
        if ($workoutPlan->image && file_exists(public_path($workoutPlan->image))) {
            unlink(public_path($workoutPlan->image));
        }

        $workoutPlan->delete();
        return redirect()->route('workout_plans.index');
    }
}
