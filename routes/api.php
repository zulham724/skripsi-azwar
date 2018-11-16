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

Route::apiResource('clients','API\ClientController');
Route::post('register','API\UserController@store');

Route::group(['middleware'=>'auth:api','namespace'=>'API'],function(){
	Route::apiResources([
		'roles'=>'RoleController',
		'users'=>'UserController',
		'biodatas'=>'BiodataController',
		'datas'=>'DataController',
		'pollings'=>'PollingController',
		'sockets'=>'SocketController'
	]);

	Route::get('compare/dates','CompareController@dates');
	Route::get('compare/bandwidth','CompareController@bandwidth');
	Route::get('compare/cpu','CompareController@cpu');
	Route::get('compare/memory','CompareController@memory');
});
