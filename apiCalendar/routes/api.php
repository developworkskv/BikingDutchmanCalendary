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
Route::get('sesion/{token_email}/{id_org}', 'LoginController@sesion');


// User
Route::get('dataUserById/{id_user}', 'UserController@dataUserById');
Route::get('dataUserByEmail/{email_user}', 'UserController@dataUserByEmail');

// ===================================================0
//CRUD para ADMINISTRADOR Y EMPLEADOS
Route::post('adminCreate', 'UserController@createAdmin');
Route::get('adminRead', 'UserController@getAllAdministrators');
Route::get('adminById/{id_admin}', 'UserController@getAdmin');
Route::post('admin/{bd_users_id}/update', 'UserController@updateAdministratorData');
Route::get('adminDelete/{id_admin}', 'UserController@deleteAdmin');

// TIPE USERS
Route::get('typesUser', 'UserController@allTipesUser');

//CRUD para TIPOS DE PAQUETES
Route::post('packageCreate/{id_org}', 'PackagesController@createTypePackages');
Route::get('packagesRead', 'PackagesController@getAllTypesPackages');
Route::get('packageById/{id_admin}/org/{id_org}', 'PackagesController@getTypePackageId');
Route::post('package/{bd_users_id}/update/{id_org}/org', 'PackagesController@updateTypePackageData');
Route::get('packageDelete/{id_package}/org/{id_org}', 'PackagesController@deleteTypePackage');

// API BOT
//test - get
Route::get('packagesReadB', 'PackagesController@getAllTypesPackagesBot');
// test -post
Route::post('testChatbot', 'TestController@testChatbot');
Route::get('responseTest', 'TestController@responseChatbotDataToBD');
//test -show view data of chatbot
Route::get('notifications', 'TestController@getToShowInView');

//test- WA
Route::get('testWA/{prdoComent}', 'TestController@testChatbotWA');
Route::get('responseTestWA', 'TestController@responseChatbotDataToBDWA');
Route::get('deleteBDWA', 'TestController@deleteBDWA');


