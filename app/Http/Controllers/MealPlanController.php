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
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'ingredient' => 'required|string|max:255',
            'type' => 'required|integer|max:255',
            'calories' => 'required|string|max:255',
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

        MealPlan::create($data);
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


    public function update(Request $request, $id)
    {
        $mealplan = MealPlan::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($mealplan->image && file_exists(public_path($mealplan->image))) {
                unlink(public_path($mealplan->image));
            }

            $imagePath = $request->file('image');
            $filename = time() . '.' . $imagePath->getClientOriginalExtension();
            $imagePath->move('uploads/images/', $filename);
            $mealplan->image = 'uploads/images/' . $filename;
        }

        $mealplan->update($request->except('image'));
        return redirect()->route('meal_plans.index');
    }

   
    public function destroy($id)
    {
        $mealplan = MealPlan::findOrFail($id);

        // Delete the image if it exists
        if ($mealplan->image && file_exists(public_path($mealplan->image))) {
            unlink(public_path($mealplan->image));
        }
        $mealplan->delete();
        return redirect()->route('meal_plans.index');
    }
}
