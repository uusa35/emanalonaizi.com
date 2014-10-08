<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', 'HomeController@index');
Route::get('category/{categoryId}', 'CategoryController@index');
Route::resource('post','PostController',['only'=>'show']);
Route::get('/aboutus', ['as'=>'aboutus', 'uses'=>'AboutUsController@index']);


Route::group(['before'=>'guest'], function () {


    Route::group(['before'=>'csrf'], function () {

        // check data in login user
        Route::post('account/login',['as'=>'account-login','uses'=>'AccountController@checkAccount']);

    });
});