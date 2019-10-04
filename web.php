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

Route::get('/posts','PostController@index');

Route::get('/posts/view/{id}','PostController@view');

Route::get('/posts/add','PostController@add');
Route::post('/posts/add','PostController@create');

Route::get('/posts/edit/{id}','PostController@edit');
Route::post('/posts/edit/{id}','PostController@update');

Route::get('/posts/delete/{id}','PostController@delete');

Route::post('/comments/add','CommentController@create');

Route::get('/comments/delete/{id}','CommentController@delete');

Route::get('/', 'PostController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
