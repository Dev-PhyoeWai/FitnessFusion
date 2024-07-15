<?php

namespace App\Http\Controllers;

use App\Models\Goals;
use Illuminate\Http\Request;

class GoalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $goals = Goals::where('user_id', auth()->id())->orderBy('user_id', 'desc')->get(); // Get user's activities (assuming user is authenticated)
        return view('goals.index', compact('goals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('goals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $goalData = $request->all(); 

        $goals = new Goals;
        $goals->user_id = auth()->id(); // Assuming user is authenticated
        $goals->type = $goalData['type'];
        $goals->targetvalue = $goalData['targetvalue'];
        $goals->progress = $goalData['progress']; // Might be null
        $goals->deadline = $goalData['deadline'];

        $goals->save();

        return redirect()->route('goal.index')->with('success', 'Goals created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Goals $goals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goals $goal)
    {
        return view('goals.edit', compact('goal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $goalData = $request->all();
        $goal = Goals::findOrFail($id);
        $goal->update($goalData);
    
        return redirect()->route('goal.index')->with('success', 'Goal updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $goal = Goals::findOrFail($id);
        $goal->delete();
    
        return redirect()->route('goal.index')->with('success', 'Goal deleted successfully');
    }
    
}
