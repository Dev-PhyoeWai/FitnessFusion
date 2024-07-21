<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiBaseController;
use App\Models\MealPlan;
use App\Models\Subscription;
use Illuminate\Http\Request;

class MealPlanController extends ApiBaseController
{
    public function index()
    {
        $mealPlans = MealPlan::all();
        return $this->success(true, $mealPlans, 'Meal Plans retrieved successfully.');
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
            'ingredient' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'calories' => 'required|integer',
            'subscription_id' => 'required|integer|exists:subscriptions,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $filename = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('storage/images/meal/'), $filename);
            $imagePath = 'storage/images/meal/' . $filename;
        }

        $data = $request->all();
        $data['image'] = $imagePath;

        $mealPlan = MealPlan::create($data);
        return $this->success(true, $mealPlan, 'Meal Plan created successfully.');
    }

    public function show($id)
    {
        $mealPlan = MealPlan::find($id);
        return $this->success(true, $mealPlan, 'Meal Plan retrieved successfully.');
    }

    public function edit(MealPlan $mealPlan)
    {
        $subscriptions = Subscription::all();
        return $this->success(true, compact('mealPlan', 'subscriptions'), 'Meal Plan and Subscriptions retrieved successfully.');
    }

    public function update(Request $request, $id)
    {
        $mealPlan = MealPlan::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($mealPlan->image && file_exists(public_path($mealPlan->image))) {
                unlink(public_path($mealPlan->image));
            }

            $imagePath = $request->file('image');
            $filename = time() . '.' . $imagePath->getClientOriginalExtension();
            $imagePath->move('storage/images/meal/', $filename);
            $mealPlan->image = 'storage/images/meal/' . $filename;
        }

        $mealPlan->update($request->except('image'));

        return $this->success(true, $mealPlan, 'Meal Plan updated successfully.');
    }

    public function destroy($id)
    {
        $mealPlan = MealPlan::findOrFail($id);

        if ($mealPlan->image && file_exists(public_path($mealPlan->image))) {
            unlink(public_path($mealPlan->image));
        }

        $mealPlan->delete();

        return $this->success(true, null, 'Meal Plan deleted successfully.');
    }
}
