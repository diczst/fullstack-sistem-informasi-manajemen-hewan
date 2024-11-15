<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([
    'middleware' => 'api',
], function () {
    Route::post('login',  [AuthController::class, 'login']);
    Route::post('refresh',  [AuthController::class, 'refresh']);
    Route::post('me',  [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
});