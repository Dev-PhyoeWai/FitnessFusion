<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\MealPlanController;
use App\Http\Controllers\Api\Auth\SubscriptionController;
use App\Http\Controllers\Api\Auth\UserController;
use App\Http\Controllers\Api\Auth\WorkoutPlanController;
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
    Route::post('/user/{id}/edit', [LoginController::class,'update']);

    Route::post('user/logout', [LoginController::class, 'logout']);

});

Route::post('user/login', [LoginController::class, 'auth']);
Route::post('user/register', [LoginController::class, 'store']);

// API route for Subscriptions
Route::apiResource('/subscriptions_data', SubscriptionController::class);
// API route for workout plans for a specific subscription
Route::get('/subscriptions/{id}/workout-plans',
    [SubscriptionController::class, 'workoutPlans']);
// API route for meal plans for a specific subscription
Route::get('/subscriptions/{id}/meal-plans',
    [SubscriptionController::class, 'mealPlans']);

Route::get('/workouts',[WorkoutPlanController::class,'index']);
Route::get('/workouts/{id}',[WorkoutPlanController::class,'show']);
Route::post('/workouts/{id}/edit',[WorkoutPlanController::class,'update']);

Route::get('/meals',[MealPlanController::class,'index']);
Route::get('/meals/{id}',[MealPlanController::class,'show']);
Route::post('/meals/{id}/edit',[MealPlanController::class,'update']);

