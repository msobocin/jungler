<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::model('comments', 'Comment');
Route::model('users', 'User');
Route::model('posts', 'Post');

//Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Provide controller methods with object instead of ID

Route::bind('users', function($value, $route) {
    return App\User::whereSlug($value)->first();
});
Route::bind('posts', function($value, $route) {
	return App\Post::whereSlug($value)->first();
});

Route::resource('posts', 'PostsController');
Route::resource('posts.comments', 'CommentsController');
Route::resource('/', 'PostsController');
Route::resource('users', 'UsersController');
Route::resource('comments', 'CommentsController');
