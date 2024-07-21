<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Userlogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends ApiBaseController
{
    public function store(StoreUserRequest $request)
    {

        if ($request->validated()) {

            $user=User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if (!$user ) {

                return response()->json([
                    'error' => 'These credentials do not match any of our records.'
                ]);
            } else {

                return response()->json([
                    'user' => $user,
                    'message' => 'Logged in successfully.',
                    'currentToken' => $user->createToken('new_user')->plainTextToken
                ]);
            }
        }
    }
    public function auth(AuthUserRequest $request)
    {
        if ($request->validated()) {

            $user = User::whereEmail($request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {

                return response()->json([
                    'error' => 'These credentials do not match any of our records.'
                ]);
            } else {

                return response()->json([
                    'user' => $user,
                    'message' => 'Logged in successfully.',
                    'currentToken' => $user->createToken('new_user')->plainTextToken
                ]);
            }
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return $this->error(404, 'User not found.');
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'email|max:255|unique:users,email',
            'age' => 'integer|min:0|max:120',
            'height' => 'numeric|min:0|max:300',
            'weight' => 'numeric|min:0|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'BMI' => 'nullable|numeric|min:0|max:100',
            'subscription_id' => 'nullable|integer|exists:subscriptions,id',
        ]);

        if ($request->hasFile('image')) {
            if ($user->image && file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('storage/profiles'), $imageName);
            $image = 'storage/profiles/'.$imageName;
            $user->update(array_merge(['image' => $image, $request->all()]));
        }else{
            $user->update($request->all());
        }

        return $this->success(200, $user, 'User updated successfully.');
    }

    public function show($id)
    {
        $user = User::with(['subscription.workoutPlans', 'subscription.mealPlans'])->find($id);

        if (!$user) {
            return $this->error(404, 'User not found.');
        }

        $formattedUser = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'age' => $user->age,
            'height' => $user->height,
            'weight' => $user->weight,
            'image' => $user->image,
            'BMI' => $user->BMI,
            'subscriptions' => $user->subscription ? [
                    'workoutPlans' => $user->subscription->workoutPlans->map(function ($workoutPlan) {
                        return [
                            'id' => $workoutPlan->id,
                            'name' => $workoutPlan->name,
                            'body_part' => $workoutPlan->body_part,
                            'type' => $workoutPlan->type,
                            'day' => $workoutPlan->day,
                            'week' => $workoutPlan->week,
                            'set' => $workoutPlan->set,
                            'raps' => $workoutPlan->raps,
                            'gender' => $workoutPlan->gender,
                            'image' => $workoutPlan->image,
                        ];
                    }),
                    'mealPlans' => $user->subscription->mealPlans->map(function ($mealPlan) {
                        return [
                            'id' => $mealPlan->id,
                            'name' => $mealPlan->name,
                            'ingredient' => $mealPlan->ingredient,
                            'type' => $mealPlan->type,
                            'day' => $mealPlan->day,
                            'week' => $mealPlan->week,
                            'calories' => $mealPlan->calories,
                            'image' => $mealPlan->image,
                        ];
                    }),
                ]   : null,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ];

        return response()->json([
            'user' => $formattedUser,
            'message' => 'User retrieved successfully.',
            'currentToken' => auth()->check() ? auth()->user()->currentAccessToken()->plainTextToken : null,
        ], 200);
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully.'
        ]);
    }

    public function subscribe(Request $request, $userId)
    {
        $validator = Validator::make($request->all(), [
            'subscription_id' => 'required|exists:subscriptions,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // $user= Auth::user();
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $subscription = Subscription::find($request->subscription_id);

        $user->subscription_id = $subscription->id;
        $user->save();

        // Log the subscription
        Userlogs::create([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'subscription_id' => $subscription->id,
            'subscription_name' => $subscription->name,
        ]);

        return response()->json(['success' => 'User subscribed successfully', 'user' => $user], 200);
    }
}

//
//namespace App\Http\Controllers\Api\Auth;
//
//use App\Http\Controllers\Api\ApiBaseController;
//use App\Http\Requests\AuthUserRequest;
//use App\Http\Requests\StoreUserRequest;
//use App\Models\User;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Validator;
//
//class LoginController extends ApiBaseController
//{
//    public function store(StoreUserRequest $request)
//    {
//        if ($request->validated()) {
//            $user = User::create([
//                'name' => $request->name,
//                'email' => $request->email,
//                'password' => Hash::make($request->password),
//            ]);
//
//            if (!$user) {
//                return $this->error(401, 'These credentials do not match any of our records.');
//            } else {
//                return $this->success(200, [
//                    'user' => $user,
//                    'currentToken' => $user->createToken('new_user')->plainTextToken
//                ], 'Logged in successfully.');
//            }
//        }
//    }
//
////    public function show($id)
////    {
////        $users = User::find($id);
////
////        if (!$users) {
////            return $this->error(404, 'Subscription not found.');
////        }
////
////        return $this->success(200, $users, 'Subscription retrieved successfully.');
////    }
//
//    public function show($id)
//    {
//        $user = User::with(['subscriptions.workoutPlans', 'subscriptions.mealPlans'])->find($id);
//
//        if (!$user) {
//            return $this->error(404, 'User not found.');
//        }
//
//        $formattedUser = [
//            'id' => $user->id,
//            'name' => $user->name,
//            'email' => $user->email,
//            'subscriptions' => $user->subscriptions->mapWithKeys(function ($subscription) {
//                return [

//                    $subscription->id => [
//                        'workoutPlans' => $subscription->workoutPlans->map(function ($workoutPlans) {
//                            return [
//                                'id' => $workoutPlans->id,
//                                'name' => $workoutPlans->name,
//                                'body_part' => $workoutPlans->body_part,
//                                'type' => $workoutPlans->type,
//                                'set' => $workoutPlans->set,
//                                'raps' => $workoutPlans->raps,
//                                'gender' => $workoutPlans->gender,
//                                'image' => $workoutPlans->image,
//                            ];
//                        }),
//                        'mealPlans' => $subscription->mealPlans->map(function ($mealPlans) {
//                            return [
//                                'id' => $mealPlans->id,
//                                'name' => $mealPlans->name,
//                                'ingredient' => $mealPlans->ingredient,
//                                'type' => $mealPlans->type,
//                                'calories' => $mealPlans->calories,
//                                'image' => $mealPlans->image,
//                            ];
//                        }),
//                    ],
//                ];
//            }),
//            'created_at' => $user->created_at,
//            'updated_at' => $user->updated_at,
//        ];
//
//        return response()->json([
//            'user' => $formattedUser,
//            'message' => 'User retrieved successfully.',
//            'currentToken' => auth()->user() ? auth()->user()->currentAccessToken()->plainTextToken : null,
//        ], 200);
//    }
//    public function update(Request $request, $id)
//    {
//        $users = User::find($id);
//
//        if (!$users) {
//            return $this->error(404, 'Subscription not found.');
//        }
//
//        $validator = Validator::make($request->all(), [
//            'name' => 'sometimes|required|string|max:255',
//            'email' => 'required|email|max:255|unique:users,email',
//            'age' => 'required|integer|min:0|max:120',
//            'height' => 'required|numeric|min:0|max:300',
//            'weight' => 'required|numeric|min:0|max:500',
//            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//            'BMI' => 'nullable|numeric|min:0|max:100',
//            'password' => 'required|string|min:8|confirmed',
//            'subscription_id' => 'nullable|integer|exists:subscriptions,id',
//        ]);
//
//
//        if ($validator->fails()) {
//            return $this->error(400, $validator->errors()->first());
//        }
//
//        $users->update($request->all());
//
//        return $this->success(200, $users, 'Subscription updated successfully.');
//    }
//
//    public function auth(AuthUserRequest $request)
//    {
//        if ($request->validated()) {
//            $user = User::whereEmail($request->email)->first();
//
//            if (!$user || !Hash::check($request->password, $user->password)) {
//                return $this->error(401, 'These credentials do not match any of our records.');
//            } else {
//                return $this->success(200, [
//                    'user' => $user,
//                    'currentToken' => $user->createToken('new_user')->plainTextToken
//                ], 'Logged in successfully.');
//            }
//        }
//    }
//    public function logout(Request $request)
//    {
//        $request->user()->currentAccessToken()->delete();
//
//        return $this->success(200, null, 'Logged out successfully.');
//    }
//}

