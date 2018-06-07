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

Route::get('/profile/{user}', 'UserController@show')->name('profile')->middleware('auth');

Route::get('/public/profile/{user}', 'UserController@show_profile')->name('profile.public');

Route::post('/profile/{user}/add', 'FriendController@add');

Route::post('/profile/{user}/accept', 'FriendController@accept');

Route::post('/profile/{user}/decline', 'FriendController@decline_unfriend');


Route::get('/search','UserController@search')->name('search');


Route::get('/settings/{user}', 'UserController@settings')->name('settings')->middleware('auth');

Route::put('/profile/{user}/update', 'UserController@update');

Route::put('/settings/{user}/update_settings', 'UserController@update_password');

Route::post('/post/create','PostController@store');

Route::get('/post/{post}','PostController@show');

Route::get('/post/{post}/edit','PostController@edit')->name('post.edit');

Route::put('/post/{post}/update','PostController@update')->name('post.update');

Route::post('/comment/{post}/reply','CommentController@store');

Route::post('/comment/{post}/reply/{comment}','CommentController@reply');


Route::get('/post/{id}/like','LikeController@like_post')->name('post.like');

Route::get('/comment/{id}/like','LikeController@like_comment')->name('comment.like');

