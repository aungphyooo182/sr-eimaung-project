<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: *");

Route::get('/categories','CategoryController@all');
Route::get('/categories/{id}','CategoryController@get');
Route::post('/categories','CategoryController@add');
Route::put('/categories/{id}','CategoryController@edit');
Route::delete('/categories/{id}','CategoryController@delete');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


