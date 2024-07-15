<?php
//
//namespace App\Http\Controllers\Api\Auth;
//
//use App\Http\Controllers\Api\ApiBaseController;
//use App\Http\Controllers\Controller;
//use App\Http\Requests\AuthUserRequest;
//use App\Http\Requests\StoreUserRequest;
//use App\Models\User;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;
//
//class LoginController extends ApiBaseController
//{
//    public function store(StoreUserRequest $request)
//    {
//
//        if ($request->validated()) {
//
//            $user=User::create([
//                'name' => $request->name,
//                'email' => $request->email,
//                'password' => Hash::make($request->password),
//            ]);
//
//            if (!$user ) {
//
//                return response()->json([
//                    'error' => 'These credentials do not match any of our records.'
//                ]);
//            } else {
//
//                return response()->json([
//                    'user' => $user,
//                    'message' => 'Logged in successfully.',
//                    'currentToken' => $user->createToken('new_user')->plainTextToken
//                ]);
//            }
//        }
//    }
//    public function auth(AuthUserRequest $request)
//    {
//        if ($request->validated()) {
//
//            $user = User::whereEmail($request->email)->first();
//
//            if (!$user || !Hash::check($request->password, $user->password)) {
//
//                return response()->json([
//                    'error' => 'These credentials do not match any of our records.'
//                ]);
//            } else {
//
//                return response()->json([
//                    'user' => $user,
//                    'message' => 'Logged in successfully.',
//                    'currentToken' => $user->createToken('new_user')->plainTextToken
//                ]);
//            }
//        }
//    }
//
//    public function logout(Request $request)
//    {
//        $request->user()->currentAccessToken()->delete();
//
//        return response()->json([
//            'message' => 'Logged out successfully.'
//        ]);
//    }
//}


namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends ApiBaseController
{
    public function store(StoreUserRequest $request)
    {
        if ($request->validated()) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if (!$user) {
                return $this->error(401, 'These credentials do not match any of our records.');
            } else {
                return $this->success(200, [
                    'user' => $user,
                    'currentToken' => $user->createToken('new_user')->plainTextToken
                ], 'Logged in successfully.');
            }
        }
    }

//    public function show($id)
//    {
//        $users = User::find($id);
//
//        if (!$users) {
//            return $this->error(404, 'Subscription not found.');
//        }
//
//        return $this->success(200, $users, 'Subscription retrieved successfully.');
//    }

    public function show($id)
    {
        $user = User::with(['subscriptions.workoutPlans', 'subscriptions.mealPlans'])->find($id);

        if (!$user) {
            return $this->error(404, 'User not found.');
        }

        $formattedUser = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'subscriptions' => $user->subscriptions->mapWithKeys(function ($subscription) {
                return [
                    $subscription->id => [
                        'workoutPlans' => $subscription->workoutPlans->map(function ($workoutPlans) {
                            return [
                                'id' => $workoutPlans->id,
                                'name' => $workoutPlans->name,
                            ];
                        }),
                        'mealPlans' => $subscription->mealPlans->map(function ($mealPlans) {
                            return [
                                'id' => $mealPlans->id,
                                'name' => $mealPlans->name,
                            ];
                        }),
                    ],
                ];
            }),
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ];

        return response()->json([
            'user' => $formattedUser,
            'message' => 'User retrieved successfully.',
            'currentToken' => auth()->user() ? auth()->user()->currentAccessToken()->plainTextToken : null,
        ], 200);
    }
    public function update(Request $request, $id)
    {
        $users = User::find($id);

        if (!$users) {
            return $this->error(404, 'Subscription not found.');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'age' => 'required|integer|min:0|max:120',
            'height' => 'required|numeric|min:0|max:300',
            'weight' => 'required|numeric|min:0|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'BMI' => 'nullable|numeric|min:0|max:100',
            'password' => 'required|string|min:8|confirmed',
            'subscription_id' => 'nullable|integer|exists:subscriptions,id',
        ]);


        if ($validator->fails()) {
            return $this->error(400, $validator->errors()->first());
        }

        $users->update($request->all());

        return $this->success(200, $users, 'Subscription updated successfully.');
    }

    public function auth(AuthUserRequest $request)
    {
        if ($request->validated()) {
            $user = User::whereEmail($request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return $this->error(401, 'These credentials do not match any of our records.');
            } else {
                return $this->success(200, [
                    'user' => $user,
                    'currentToken' => $user->createToken('new_user')->plainTextToken
                ], 'Logged in successfully.');
            }
        }
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->success(200, null, 'Logged out successfully.');
    }
}

