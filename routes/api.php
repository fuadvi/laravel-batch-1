<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(\App\Http\Controllers\AuthController::class)
    ->group(function (){
        Route::post('register', 'register');
        Route::post('login', 'login');
        Route::get('get-profile', 'getProfile')->middleware('auth:sanctum');
    });

Route::apiResource('cinemas',\App\Http\Controllers\CinemasController::class)->middleware('auth:sanctum');
