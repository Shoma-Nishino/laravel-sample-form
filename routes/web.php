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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PostsController@index');
Route::get('/posts/{id}', 'PostsController@show')->where('id', '[0-9]+');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/edit/{id}', 'PostsController@edit');
Route::post('/edit', 'PostsController@update');
// Route::get('/delete/{id}', 'PostsController@destroy');
Route::post('/delete', 'PostsController@destroy');
Route::get('/edit/{post}/comments/{comment}', 'CommentsController@edit');
Route::post('/edit/comment', 'CommentsController@update');
Route::post('/posts/{id}/comments', 'CommentsController@store');
Route::post('/posts/{post}/comments/{comment}', 'CommentsController@destroy');