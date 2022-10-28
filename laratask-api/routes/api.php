<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Domain\UseCase\CreateTaskDto;
use App\Domain\UseCase\CreateTask;
use App\Http\Controllers\TaskController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/test',function (){


//     $createTaskDto = new CreateTaskDto([
//         'name'=>'test',
//         'completed' => false,
//         'description' => 'test'
//     ]);

//     $createTask = new CreateTask();

//     $output = $createTask->execute($createTaskDto);
//     return [
//         'msg' => $output
//     ];
// });


Route::post('/tasks/create',[TaskController::class ,'create']);
