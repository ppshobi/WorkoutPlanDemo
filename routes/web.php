<?php

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
    return redirect('/plans');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/plans', 'PlanController@index')->name('plans');
Route::get('/plans/create', 'PlanController@create')->name('plans.create');
Route::post('/plans', 'PlanController@store')->name('plans.store');
Route::get('/plans/{plan}', 'PlanController@show')->name('plans.show');
Route::patch('/plans/{plan}', 'PlanController@update')->name('plans.update');
Route::delete('/plans/{plan}', 'PlanController@destroy')->name('plans.update');

Route::resource('exercise', 'ExerciseController');
Route::resource('days', 'DaysController');
Route::resource('exercise-instance', 'ExerciseInstanceController');
Route::delete('exercise-instance/{day_id}/{exercise_id}', 'ExerciseInstanceController@delete');
Route::resource('users', 'UserController');