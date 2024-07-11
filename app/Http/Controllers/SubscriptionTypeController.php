<?php
namespace App\Http\Controllers;

use App\Models\SubscriptionType;
use Illuminate\Http\Request;

class SubscriptionTypeController extends Controller
{
    public function index()
    {
        $subscriptionTypes = SubscriptionType::all();
        return view('subscription_types.index', compact('subscriptionTypes'));
//        return SubscriptionType::all();
    }

    public function create()
    {
        return view('subscription_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        SubscriptionType::create($request->all());

        return redirect()->route('subscription-types.index')
            ->with('success', 'Subscription Type created successfully.');
//        return SubscriptionType::create($request->all());
    }

    public function show(SubscriptionType $subscriptionType)
    {
        return view('subscription_types.show', compact('subscriptionType'));
//        return $subscriptionType;
    }

    public function edit(SubscriptionType $subscriptionType)
    {
        return view('subscription_types.edit', compact('subscriptionType'));
    }

    public function update(Request $request, SubscriptionType $subscriptionType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $subscriptionType->update($request->all());

        return redirect()->route('subscription-types.index')
            ->with('success', 'Subscription Type updated successfully.');

//        return $subscriptionType;
    }

    public function destroy(SubscriptionType $subscriptionType)
    {
        $subscriptionType->delete();

        return redirect()->route('subscription-types.index')
            ->with('success', 'Subscription Type deleted successfully.');
//        return response()->noContent();
    }
}
