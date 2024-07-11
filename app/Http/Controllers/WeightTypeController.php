<?php
namespace App\Http\Controllers;

use App\Models\WeightType;
use Illuminate\Http\Request;

class WeightTypeController extends Controller
{
    public function index()
    {
        $weightTypes = WeightType::all();
        return view('weight_types.index', compact('weightTypes'));
//        return WeightType::all();
    }

    public function create()
    {
        return view('weight_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        WeightType::create($request->all());
//        return WeightType::create($request->all());
        return redirect()->route('weight-types.index')
            ->with('success', 'Weight Type created successfully.');
    }

    public function show(WeightType $weightType)
    {
        return view('weight_types.show', compact('weightType'));
//        return $weightType;
    }

    public function edit(WeightType $weightType)
    {
        return view('weight_types.edit', compact('weightType'));
    }

    public function update(Request $request, WeightType $weightType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $weightType->update($request->all());

        return redirect()->route('weight-types.index')
            ->with('success', 'Weight Type updated successfully.');

//        return $weightType;
    }

    public function destroy(WeightType $weightType)
    {
        $weightType->delete();

        return redirect()->route('weight-types.index')
            ->with('success', 'Weight Type deleted successfully.');
//        return response()->noContent();
    }
}
