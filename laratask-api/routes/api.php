<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\CreateUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateTaskController;
use App\Http\Controllers\DeleteTaskController;
use App\Http\Controllers\GetTaskController;
use App\Http\Controllers\GetTasksController;
use App\Http\Controllers\UpdateTaskController;
use App\Http\Controllers\CompleteTaskController;

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
        Route::get('/', [GetTasksController::class ,'handle']);
        Route::get('/{id}', [GetTaskController::class ,'handle']);
        Route::delete('/{id}', [DeleteTaskController::class ,'handle']);
        Route::put('/{id}', [UpdateTaskController::class ,'handle']);
        Route::patch('/completeTask/{id}', [CompleteTaskController::class ,'handle']);
        Route::post('/create', [CreateTaskController::class ,'handle']);
    });

    Route::post('/auth/logOut',[AuthController::class ,'logOut']);
});


Route::prefix('users')->group(function () {
    Route::post('/create', [CreateUserController::class ,'handle']);
});

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class ,'handle']);
});


