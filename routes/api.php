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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'API\UserController@register');
Route::post('login', 'API\UserController@login');
Route::post('update/{id}', 'API\UserController@updateUser');
Route::delete('delete/{id}', 'API\UserController@deleteUser');
Route::get('listAll', 'API\UserController@index');
Route::get('getUser/{id}', 'API\UserController@show');
