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

    public function show($id)
    {
        $users = User::find($id);

        if (!$users) {
            return $this->error(404, 'Subscription not found.');
        }

        return $this->success(200, $users, 'Subscription retrieved successfully.');
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

