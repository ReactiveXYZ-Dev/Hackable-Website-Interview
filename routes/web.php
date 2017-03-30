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

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => "posts", 'middleware' => "auth"], function() {

	Route::get('my', 'PostController@myPosts');

	Route::get('{post}/show', 'PostController@showPost');

	Route::group(['prefix' => "create"], function() {

		Route::get('/', 'PostController@showPostComposer');

		Route::post('/', 'PostController@createPost');

	});

});
