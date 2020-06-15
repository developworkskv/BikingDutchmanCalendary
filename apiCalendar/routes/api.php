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

Route::get('testWA/{prdoComent}', 'TestController@testChatbotWA');
Route::get('responseTestWA', 'TestController@responseChatbotDataToBDWA');
Route::get('deleteBDWA', 'TestController@deleteBDWA');


//CRUD PARA DETINOS 
Route::post('destinoCreate/{id_org}', 'DestinationController@createDestino');
Route::get('destinoRead/{id_org}', 'DestinationController@readAllDestinations');
Route::post('destinoUpdate/{id_destino}/update', 'DestinationController@updateDestino');
Route::get('destinoDelete/{id_destino}/org/{id_org}', 'DestinationController@deleteDestino');
Route::get('destinoById/{id_destino}/org/{id_org}', 'DestinationController@getDestinoById');


//CRUD CITIES
Route::post('newCity/{id_org}', 'CitiesController@createCity');
Route::get('citiesRead/{id_org}', 'CitiesController@getAllCities');
Route::get('getCityId/{id_city}/org/{id_org}', 'CitiesController@getCityId');
Route::post('city/{id_city}/update/{id_org}/org', 'CitiesController@updateCityData');
Route::get('deleteCity/{id_package}/org/{id_org}', 'CitiesController@deleteCity');



// PDF REPORTS BIKING DUTCHMAN
Route::get('descargar-pdf/{id_org}', 'PDFController@pdf')->name('products.pdf');

//CRUD CLIENTES M
Route::post('clientCreate/{id_org}', 'ClientController@createClient');
Route::get('clientRead/{id_org}', 'ClientController@getAllClient');
Route::post('clientUpdate/{id_client}/update', 'ClientController@updateClient');
Route::get('clientDelete/{id_client}/org/{id_org}', 'ClientController@deleteClient');
Route::get('clientById/{id_client}/org/{id_org}', 'ClientController@getClientById');

