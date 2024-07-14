<?php

//class SubscriptionController extends Controller
//{
////    public function index()
//    {
//        $subscriptions = Subscription::all();
//        return view('subscriptions.index', compact('subscriptions'));
//    }
//
//    public function create()
//    {
//        return view('subscriptions.create');
//    }
//
//    public function store(Request $request)
//    {
//        Subscription::create($request->all());
//        return redirect()->route('subscriptions.index');
//    }
//
//    public function show(Subscription $subscription)
//    {
//        return view('subscriptions.show', compact('subscription'));
//    }
//
//    public function edit(Subscription $subscription)
//    {
//        return view('subscriptions.edit', compact('subscription'));
//    }
//
//    public function update(Request $request, Subscription $subscription)
//    {
//        $subscription->update($request->all());
//        return redirect()->route('subscriptions.index');
//    }
//
//    public function destroy(Subscription $subscription)
//    {
//        $subscription->delete();
//        return redirect()->route('subscriptions.index');
//    }


namespace App\Http\Controllers;

    use App\Models\Subscription;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{

    public function index()
    {
        $subscriptions = Subscription::all();
        return response()->json([
            'success' => true,
            'data' => $subscriptions
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'month' => 'required|integer',
            'weight_type' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        $subscription = Subscription::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $subscription
        ], 201);
    }

    public function show($id)
    {
        $subscription = Subscription::find($id);

        if (!$subscription) {
            return response()->json([
                'success' => false,
                'message' => 'Subscription not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $subscription
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $subscription = Subscription::find($id);

        if (!$subscription) {
            return response()->json([
                'success' => false,
                'message' => 'Subscription not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'month' => 'sometimes|required|integer',
            'weight_type' => 'sometimes|required|string|max:255',
            'image' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        $subscription->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $subscription
        ], 200);
    }

    public function destroy($id)
    {
        $subscription = Subscription::find($id);

        if (!$subscription) {
            return response()->json([
                'success' => false,
                'message' => 'Subscription not found'
            ], 404);
        }

        $subscription->delete();

        return response()->json([
            'success' => true,
            'message' => 'Subscription deleted successfully'
        ], 200);
    }
    // get workout plans for a specific subscription
    public function workoutPlans($id)
    {
        $subscription = Subscription::find($id);

        if (!$subscription) {
            return response()->json([
                'success' => false,
                'message' => 'Subscription not found'
            ], 404);
        }

        $workoutPlans = $subscription->workoutPlans;

        return response()->json([
            'success' => true,
            'data' => $workoutPlans
        ], 200);
    }
    // get meal plans for a specific subscription
    public function mealPlans($id)
    {
        $subscription = Subscription::find($id);

        if (!$subscription) {
            return response()->json([
                'success' => false,
                'message' => 'Subscription not found'
            ], 404);
        }

        $mealPlans = $subscription->mealPlans;

        return response()->json([
            'success' => true,
            'data' => $mealPlans
        ], 200);
    }
}

