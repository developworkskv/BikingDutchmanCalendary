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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('conexionApiTest', 'TestController@conexionApiTest');

//Login
Route::post('iniciarSesion', 'LoginController@iniciarSesion');

// User
Route::get('dataUserById/{id_user}', 'UserController@dataUserById');
Route::get('dataUserByEmail/{email_user}', 'UserController@dataUserByEmail');


