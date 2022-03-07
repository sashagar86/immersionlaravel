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


Route::get('/', 'UserController@index')->name('users');


Route::get('/user/add', 'UserController@showCreateForm')->name('user.add');
Route::post('/user/create', 'UserController@store')->name('user.create');

Route::get('/user/{id}', 'UserController@show')->name('user.view');

Route::get('/user/edit/{id}/{template?}', 'UserController@editForm')->name('user.edit');
Route::post('/user/edit/{id}', 'UserController@update')->name('user.update');


Route::get('/user/delete/{id}', 'UserController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
