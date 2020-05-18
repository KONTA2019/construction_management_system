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

Route::get('/home', 'HomeController@index')->name('home');
// Route::post('/home', 'HomeController@index')->name('home');



Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');

Route::resource('project', 'ProjectController');
Route::resource('record_timing', 'RecordTimingController');
Route::resource('operation', 'OperationController',['except' => ['show']]);

// Route::post('save', 'OperationController@save')->name('operation.save');
// Route::post('/operation/create/{record_timing}', 'OperationController@create');
// Route::get('/operation/create/', function () {
//     $record_timing = request('record_timing');
//     return view('operation.create',['record_timing' => $record_timing]);
//  });

// Route::get('index', 'ProjectController@index')->name('project.index');
// Route::get('create', 'ProjectController@create')->name('project.create');

// Route::post('record_timing', 'RecordTimingController@create')->name('record_timing.create');