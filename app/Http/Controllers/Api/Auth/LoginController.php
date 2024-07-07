<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Controllers\Traits\ApiResponse;
use App\Http\Resources\LoginResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends ApiBaseController
{
    use ApiResponse; // trait

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->token = $user->createToken('test_testing')->plainTextToken;

            return $this->success(200, new LoginResource($user), 'Login Success');
        } else {
            return $this->error(500, 'Login Failed');
        }
    }
}
