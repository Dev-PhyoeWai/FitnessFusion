<?php

use App\Http\Controllers\Api\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::post('user/login', [LoginController::class, 'auth']);
Route::post('user/register', [LoginController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', function(Request $request) {
        return [
            'user' => $request->user(),
            'currentToken' => $request->bearerToken()
        ];
    });
    Route::post('user/logout', [LoginController::class, 'logout']);
});


