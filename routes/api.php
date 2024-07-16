<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\SubscriptionController;
use App\Http\Controllers\Api\Auth\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', function(Request $request) {
        return [
            'user' => $request->user(),
            'currentToken' => $request->bearerToken()
        ];
    });

    Route::get('/user/{id}', [LoginController::class, 'show']);
    Route::put('/user/{id}/edit', [LoginController::class,'update']);

    Route::post('user/logout', [LoginController::class, 'logout']);

});

Route::post('user/login', [LoginController::class, 'auth']);
Route::post('user/register', [LoginController::class, 'store']);

// API route for Subscriptions
Route::apiResource('/subscriptions', SubscriptionController::class);
// API route for workout plans for a specific subscription
Route::get('/subscriptions/{id}/workout-plans',
    [SubscriptionController::class, 'workoutPlans']);
// API route for meal plans for a specific subscription
Route::get('/subscriptions/{id}/meal-plans',
    [SubscriptionController::class, 'mealPlans']);

