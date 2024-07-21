<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiBaseController;
use App\Models\Subscription;
use App\Models\WorkoutPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkoutPlanController extends ApiBaseController
{
    public function index()
    {
        $workoutPlans = WorkoutPlan::all();
        return $this->success(true, $workoutPlans, 'Workout Plans retrieved successfully.');
    }

    public function create()
    {
        $subscriptions = Subscription::all();
        return $this->success(true, $subscriptions, 'Subscriptions retrieved successfully.');
    }

    public function store(Request $request)
    {
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

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $filename = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('storage/images/workout/'), $filename);
            $imagePath = 'storage/images/workout/' . $filename;
        }

        $data = $request->all();
        $data['image'] = $imagePath;

        $workoutPlan = WorkoutPlan::create($data);
        return $this->success(true, $workoutPlan, 'Workout Plan created successfully.');
    }

    public function show($id)
    {
        $workoutPlan = WorkoutPlan::find($id);
        return $this->success(true, $workoutPlan, 'Workout Plan retrieved successfully.');
    }

    public function edit(WorkoutPlan $workoutPlan)
    {
        $subscriptions = Subscription::all();
        return $this->success(true, compact('workoutPlan', 'subscriptions'), 'Workout Plan and Subscriptions retrieved successfully.');
    }

    public function update(Request $request, $id)
    {
        $workoutPlan = WorkoutPlan::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($workoutPlan->image && file_exists(public_path($workoutPlan->image))) {
                unlink(public_path($workoutPlan->image));
            }

            $imagePath = $request->file('image');
            $filename = time() . '.' . $imagePath->getClientOriginalExtension();
            $imagePath->move('storage/images/workout/', $filename);
            $workoutPlan->image = 'storage/images/workout/' . $filename;
        }

        $workoutPlan->update($request->except('image'));

        return $this->success(true, $workoutPlan, 'Workout Plan updated successfully.');
    }

    public function destroy($id)
    {
        $workoutPlan = WorkoutPlan::findOrFail($id);

        if ($workoutPlan->image && file_exists(public_path($workoutPlan->image))) {
            unlink(public_path($workoutPlan->image));
        }

        $workoutPlan->delete();

        return $this->success(true, null, 'Workout Plan deleted successfully.');
    }
}
