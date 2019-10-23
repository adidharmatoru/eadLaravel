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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

//    Route::get('/home', 'PostsController@index');
    Route::get('/post/create', 'PostsController@create');
    Route::post('/post/add', 'PostsController@store');
    Route::get('/post/{post}', 'PostsController@show');

    Route::get('/profile/{user}', 'UsersController@index')->name('profile.show');
    Route::get('/profile/{user}/edit', 'UsersController@edit')->name('profile.edit');
    Route::patch('/profile/{user}', 'UsersController@update')->name('profile.update');
});

