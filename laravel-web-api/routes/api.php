<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\PatientController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('api.auth')->group(function () {
    Route::post('refresh',  [AuthController::class, 'refresh']);
    Route::post('me',  [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::post('login',  [AuthController::class, 'login']);

Route::middleware('api.auth')->group(function () {
    Route::get('patients', [PatientController::class, 'index']);
});
