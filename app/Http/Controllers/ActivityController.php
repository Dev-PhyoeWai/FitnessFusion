<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::where('user_id', auth()->id())->orderBy('date', 'desc')->get(); // Get user's activities (assuming user is authenticated)
        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $activityData = $request->all(); 

        $activity = new Activity;
        $activity->user_id = auth()->id(); // Assuming user is authenticated
        $activity->type = $activityData['type'];
        $activity->duration = $activityData['duration'];
        $activity->distance = $activityData['distance']; // Might be null
        $activity->calories_burned = $activityData['calories_burned'];
        $activity->date = $activityData['date'];

        $activity->save();

        return redirect()->route('activity.index')->with('success', 'Activity created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        return view('activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $activityData = $request->all();

        $activity->update($activityData); 

        return redirect()->route('activity.index')->with('success', 'Activity updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();

        return redirect()->route('activity.index')->with('success', 'Activity deleted successfully!');

    }
}
