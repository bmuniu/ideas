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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function() {
    Route::get('register/user', 'RegistrationController@index');
    Route::post('register/user', 'RegistrationController@store');
    Route::get('user/{user}', 'RegistrationController@edit');
    Route::put('user', 'RegistrationController@update');
    Route::get('delete/user/{id}', 'RegistrationController@destroy');

    Route::get('departments', 'DepartmentsController@index');
    Route::post('department', 'DepartmentsController@store');
    Route::get('department/{id}', 'DepartmentsController@destroy');
});

Route::get('/post/idea', 'IdeasController@postIdea');
Route::post('/post/idea', 'IdeasController@store');
Route::get('/ideas', 'IdeasController@index');
