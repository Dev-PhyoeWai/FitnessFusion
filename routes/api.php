<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SubscriptionTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', function(Request $request) {
        return [
            'user' => $request->user(),
            'currentToken' => $request->bearerToken()
        ];
    });
    Route::post('user/logout', [LoginController::class, 'logout']);
    Route::apiResource('/subscriptions', SubscriptionController::class);
});

Route::post('user/login', [LoginController::class, 'auth']);
Route::post('user/register', [LoginController::class, 'store']);

// API route for Subscriptions
Route::apiResource('/subscriptions', SubscriptionController::class);

// API route for workout plans for a specific subscription
Route::get('/subscriptions/{id}/workout-plans',
    [SubscriptionController::class, 'workoutPlans']);

