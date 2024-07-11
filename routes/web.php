<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubscriptionTypeController;
use App\Http\Controllers\SubWeightController;
use App\Http\Controllers\WeightTypeController;
use App\Http\Controllers\WorkoutController;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// main dashboard
Route::get('/master/dashboard', function () {
    return view('layouts.master');
});
Route::get('/main/dashboard', function () {
    return view('maindashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('permissions', PermissionController::class);
Route::get('permissions/{permissionID}/delete', [PermissionController::class,'destroy']);

Route::resource('roles', RoleController::class);
Route::get('roles/{roleID}/delete', [RoleController::class,'destroy']);
Route::get('roles/{roleID}/give-permissions', [RoleController::class,'addPermissionToRole']);
Route::put('roles/{roleID}/give-permissions', [RoleController::class,'givePermissionToRole']);

Route::resource('subscription-types', SubscriptionTypeController::class);
Route::resource('weight-types', WeightTypeController::class);
Route::resource('sub-weights', SubWeightController::class);
// Api
Route::apiResource('subscription-types', SubscriptionTypeController::class);
Route::apiResource('weight-types', WeightTypeController::class);

Route::resource('workout',WorkoutController::class);

require __DIR__.'/auth.php';
