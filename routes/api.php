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

Route::group(['namespace' => 'Home', 'middleware' => 'web'], function(){
    Route::get('redirectToLogin','LoginController@redirectToLoginPage')->name('login.redirectToPage');
    Route::get('redirectToProvider/{service}', 'LoginController@redirectToProvider')->name('login.provider');
    Route::get('handleLoginCallback/{service}', 'LoginController@handleProviderCallback')->name('login.callback');
});
