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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::post('/home', 'HomeController@index')->name('home');



Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');

Route::resource('project', 'ProjectController');
Route::resource('record_timing', 'RecordTimingController');

// Route::get('index', 'ProjectController@index')->name('project.index');
// Route::get('create', 'ProjectController@create')->name('project.create');
// Route::post('store', 'ProjectController@store')->name('project.store');

// Route::post('record_timing', 'RecordTimingController@create')->name('record_timing.create');