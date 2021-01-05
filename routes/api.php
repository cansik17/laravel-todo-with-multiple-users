<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('tasks', [TaskController::class, 'index']);

Route::get('tasks/{id}', [TaskController::class, 'show']);

Route::post('tasks', [TaskController::class, 'store']);

Route::put('tasks/{id}', [TaskController::class, 'update']);

Route::delete('tasks/{id}', [TaskController::class, 'destroy']);