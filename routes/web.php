<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();


Route::get('tasks/', 'TaskController@index')->name('tasks.index');
Route::get('tasks/search', 'TaskController@search')->name('tasks.search');
//Route::get('/create', 'TaskController@create')->name('tasks.create');
Route::post('tasks/store', 'TaskController@store')->name('tasks.store');
//Route::get('/{id}', 'TaskController@show')->name('tasks.show');
Route::get('tasks/{id}/edit', 'TaskController@edit')->name('tasks.edit');
Route::put('tasks/{id}', 'TaskController@update')->name('tasks.update');
Route::delete('tasks/{id}', 'TaskController@destroy')->name('tasks.destroy');
// Route::resource('tasks', TaskController::class)->except([
//     'show', 'create'
// ]);


Route::get('admin', 'AdminController@index')->name('admin.index')->middleware('admin'); 
