<?php

namespace App\Http\Controllers;
use App\Models\SubscriptionType;
use App\Models\WeightType;
use App\Models\SubWeight;
use Illuminate\Http\Request;

class SubWeightController extends Controller
{
    public function index()
    {
        $subWeights = SubWeight::with(['subscription', 'weight'])->get();
        return view('sub_weights.index', compact('subWeights'));
    }

    public function create()
    {
        $subscriptionTypes = SubscriptionType::all();
        $weightTypes = WeightType::all();
        return view('sub_weights.create', compact('subscriptionTypes', 'weightTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required|array',
            'weight_id' => 'required|array',
        ]);

        foreach ($request->subscription_id as $subscriptionId) {
            foreach ($request->weight_id as $weightId) {
                SubWeight::create([
                    'subscription_id' => $subscriptionId,
                    'weight_id' => $weightId,
                ]);
            }
        }

        return redirect()->route('sub-weights.index')
            ->with('success', 'SubWeights created successfully.');
    }
}

