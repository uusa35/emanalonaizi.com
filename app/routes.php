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


Route::get('/', ['as'=>'home', 'uses'=>'HomeController@index']);
Route::get('category/{categoryId}', 'CategoryController@index');
Route::resource('post','PostController',['only'=>'show']);
Route::get('/aboutus', ['as'=>'aboutus', 'uses'=>'AboutUsController@index']);



/*
 * before a user is logged
 * */
Route::group(['before'=>'guest'], function () {

    Route::get('account/signup',['as'=>'account-signup','uses'=>'AccountController@getSignUp']);
    Route::get('account/signin',['as'=>'account-signin','uses'=>'AccountController@getSignIn']);
    Route::get('account/forgotpassword',['as'=>'account-forgot','uses'=>'AccountController@getForgotPassword']);
    Route::get('account/reset',['as'=>'account-reset','uses'=>'AccountController@getResetPassword']);

    Route::group(['before'=>'csrf'], function () {

        // check data in login user
        Route::post('account/signin',['as'=>'account-signin','uses'=>'AccountController@postSignIn']);
        Route::post('account/signup',['as'=>'account-signup','uses'=>'AccountController@postSignUp']);
        Route::post('account/signin',['as'=>'account-signin','uses'=>'AccountController@postSignIn']);
        Route::post('account/forgotpassword',['as'=>'account-forgot','uses'=>'AccountController@postForgotPassword']);
        Route::post('account/reset',['as'=>'account-reset','uses'=>'AccountController@postResetPassword']);

    });
});


/*
 *
 * USERS ZONE
 * */
Route::group(['after'=> 'auth'], function () {

        Route::get('account/logout', ['as'=>'account-logout', 'uses'=>'AccountController@logOut']);
        Route::group(['before'=>'csrf'], function () {
            Route::post('comment/post', ['as'=>'comment-post', 'uses'=>'CommentController@postComment']);
        });

});


/*
 *  ADMIN ZONE
 * */
Route::group(['before'=>'admin','prefix'=>'admin'], function () {

        // index for the dashboard area -- go directly to post index
        Route::get('account/',['as'=>'account','uses'=> 'AdminPostController@index']);
        Route::resource('post', 'PostController',['only'=>['index','create','update']]);
        Route::get('account/users',['as'=>'account-users','uses'=>'AdminAccountController@index']);
        Route::get('account/comments',['as'=>'account-comments','uses'=>'AdminCommentController@index']);
        Route::get('account/contactus',['as'=>'account-contactus','uses'=>'AdminContactUsController@index']);
        Route::get('account/aboutus',['as'=>'account-aboutus','uses'=>'AdminAboutUsController@index']);
        Route::group(['before'=>'csrf'], function () {
            // store + edit + delete
            Route::resource('post','PosController',['except'=>['index','create','update']]);
        });


});