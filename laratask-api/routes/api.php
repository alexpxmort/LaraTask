<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\CreateUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateTaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => 'jwt.auth'], function () {
    Route::prefix('tasks')->group(function () {
        Route::post('/create', [CreateTaskController::class ,'handle']);
    });
});


Route::prefix('users')->group(function () {
    Route::post('/create', [CreateUserController::class ,'handle']);
});

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class ,'handle']);
});


