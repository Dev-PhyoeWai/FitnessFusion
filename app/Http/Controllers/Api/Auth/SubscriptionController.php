<?php

namespace App\Http\Controllers\Api\Auth;

    use App\Http\Controllers\Api\ApiBaseController;
    use App\Http\Controllers\Controller;
	use App\Models\Subscription;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
//
//class SubscriptionController extends ApiBaseController
//{
//    public function index()
//    {
//        $subscriptions = Subscription::all();
//        return response()->json([
//            'success' => true,
//            'data' => $subscriptions
//        ], 200);
//    }
//
//    public function store(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'name' => 'required|string|max:255',
//            'month' => 'required|integer',
//            'weight_type' => 'required|string|max:255',
//            'image' => 'nullable|string|max:255',
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json([
//                'success' => false,
//                'errors' => $validator->errors()
//            ], 400);
//        }
//
//        $subscription = Subscription::create($request->all());
//
//        return response()->json([
//            'success' => true,
//            'data' => $subscription
//        ], 201);
//    }
//
//    public function show($id)
//    {
//        $subscription = Subscription::find($id);
//
//        if (!$subscription) {
//            return response()->json([
//                'success' => false,
//                'message' => 'Subscription not found'
//            ], 404);
//        }
//
//        return response()->json([
//            'success' => true,
//            'data' => $subscription
//        ], 200);
//    }
//
//    public function update(Request $request, $id)
//    {
//        $subscription = Subscription::find($id);
//
//        if (!$subscription) {
//            return response()->json([
//                'success' => false,
//                'message' => 'Subscription not found'
//            ], 404);
//        }
//
//        $validator = Validator::make($request->all(), [
//            'name' => 'sometimes|required|string|max:255',
//            'month' => 'sometimes|required|integer',
//            'weight_type' => 'sometimes|required|string|max:255',
//            'image' => 'nullable|string|max:255',
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json([
//                'success' => false,
//                'errors' => $validator->errors()
//            ], 400);
//        }
//
//        $subscription->update($request->all());
//
//        return response()->json([
//            'success' => true,
//            'data' => $subscription
//        ], 200);
//    }
//
//    public function destroy($id)
//    {
//        $subscription = Subscription::find($id);
//
//        if (!$subscription) {
//            return response()->json([
//                'success' => false,
//                'message' => 'Subscription not found'
//            ], 404);
//        }
//
//        $subscription->delete();
//
//        return response()->json([
//            'success' => true,
//            'message' => 'Subscription deleted successfully'
//        ], 200);
//    }
//    // get workout plans for a specific subscription
//    public function workoutPlans($id)
//    {
//        $subscription = Subscription::find($id);
//
//        if (!$subscription) {
//            return response()->json([
//                'success' => false,
//                'message' => 'Subscription not found'
//            ], 404);
//        }
//
//        $workoutPlans = $subscription->workoutPlans;
//
//        return response()->json([
//            'success' => true,
//            'data' => $workoutPlans
//        ], 200);
//    }
//    // get meal plans for a specific subscription
//    public function mealPlans($id)
//    {
//        $subscription = Subscription::find($id);
//
//        if (!$subscription) {
//            return response()->json([
//                'success' => false,
//                'message' => 'Subscription not found'
//            ], 404);
//        }
//
//        $mealPlans = $subscription->mealPlans;
//
//        return response()->json([
//            'success' => true,
//            'data' => $mealPlans
//        ], 200);
//    }
//}

class SubscriptionController extends ApiBaseController
{
    public function index()
    {
        $subscriptions = Subscription::all();
        return $this->success(200, $subscriptions, 'Subscriptions retrieved successfully.');
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
            return $this->error(400, $validator->errors()->first());
        }

        $subscription = Subscription::create($request->all());

        return $this->success(201, $subscription, 'Subscription created successfully.');
    }

    public function show($id)
    {
        $subscription = Subscription::find($id);

        if (!$subscription) {
            return $this->error(404, 'Subscription not found.');
        }

        return $this->success(200, $subscription, 'Subscription retrieved successfully.');
    }

    public function update(Request $request, $id)
    {
        $subscription = Subscription::find($id);

        if (!$subscription) {
            return $this->error(404, 'Subscription not found.');
        }

        $validator = Validator::make($request->all(), [
            'user_id'=>'required|integer',
            'name' => 'sometimes|required|string|max:255',
            'month' => 'sometimes|required|integer',
            'weight_type' => 'sometimes|required|string|max:255',
            'image' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->error(400, $validator->errors()->first());
        }

        $subscription->update($request->all());

        return $this->success(200, $subscription, 'Subscription updated successfully.');
    }

    public function destroy($id)
    {
        $subscription = Subscription::find($id);

        if (!$subscription) {
            return $this->error(404, 'Subscription not found.');
        }

        $subscription->delete();

        return $this->success(200, null, 'Subscription deleted successfully.');
    }
    public function workoutPlans($id)
    {
        $subscription = Subscription::find($id);

        if (!$subscription) {
            return $this->error(404, 'Subscription not found.');
        }

        $workoutPlans = $subscription->workoutPlans;

        return $this->success(200, $workoutPlans, 'Workout plans retrieved successfully.');
    }
    public function mealPlans($id)
    {
        $subscription = Subscription::find($id);

        if (!$subscription) {
            return $this->error(404, 'Subscription not found.');
        }

        $mealPlans = $subscription->mealPlans;

        return $this->success(200, $mealPlans, 'Meal plans retrieved successfully.');
    }
}

