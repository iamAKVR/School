<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function (Request $request) {
//     return "ghfgh";
// });

Route::group(['middleware' => 'api', 'namespace' => 'Api\User', 'prefix' => 'auth' ], function ($router) {

    Route::post('login', 'AuthController@login')->name('login');
    Route::post('otp', 'AuthController@otp');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    

});

Route::group(['namespace' => 'Api\User', 'prefix' => 'user' ], function ($router) {
    Route::post('create', 'RegisterController@create');

});

//  Route::group(['namespace' => 'Api\User', 'prefix' => 'otp' ], function ($router) {
//     Route::post('create','OtpController@generate');

//  });

 Route::post('register','Api\User\RegisterController@create');

 //Route::post('hello1','Api\User\HomeController@index')->name('hello1');
 //Route::get('otp','Api\User\HomeController@otp')->name('otp');


 