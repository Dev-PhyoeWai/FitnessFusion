<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
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

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully.'
        ]);
    }
}
