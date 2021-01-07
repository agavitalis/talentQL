<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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


Route::group(['prefix' => 'task/'], function () {
    Route::post('create_task', [TaskController::class, 'crateATask']);
    Route::get('get_all_tasks', [TaskController::class, 'getAllTasks']);
    Route::get('get_a_task/{task}', [TaskController::class, 'getATask']);
    Route::delete('delete_a_task/{task}', [TaskController::class, 'deleteATask']);
    Route::put('update_task/{task}', [TaskController::class, 'updateTask']);
});
