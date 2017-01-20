<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('vuejs', 'VuejsController@index')->name('vuejs.index');

Route::get('posts/vuejs/get/all', 'VuejsPostController@all')->name('vuejs.all');
Route::post('posts/vuejs', 'VuejsPostController@store')->name('vuejs.store');


Route::resource('posts', 'PostController');


