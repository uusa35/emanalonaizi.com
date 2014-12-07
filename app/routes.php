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

/*this is the post_id for about us page - i had to make it like this because she asked for gallery
 * Route::get('/aboutus', ['as'=>'aboutus', 'uses'=>'AboutUsController@index']);*/
Route::get('/contactus', ['as'=>'contactus', 'uses'=>'ContactUsController@index']);
Route::post('/contactus/email', ['as'=>'contactus-email', 'uses'=>'ContactUsController@contact']);
Route::get('category/comment/{id}', ['as'=>'category-comment','uses'=>'PostController@getCommentPage']);


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
        Route::get('account/reset', ['as'=>'account-logout', 'uses'=>'AccountController@getResetPassword']);

        Route::group(['before'=>'csrf'], function () {
            Route::post('comment/post/{post_id}/{user_id}', ['as'=>'comment-post', 'uses'=>'CommentController@postComment']);
            Route::post('account/reset', ['as'=>'account-reset', 'uses'=>'AccountController@postResetPassword']);
        });

});


/*
 *  ADMIN ZONE
 * */
Route::group(['before'=>'admin','prefix'=>'admin'], function () {

        // index for the dashboard area -- go directly to post index -- this will fetch all posts in the db
        Route::get('account/posts/{id?}',['as'=>'account-posts','uses'=> 'AdminPostController@index']);
        // index for each category - will fetch all posts related to one category
        /*Route::get('account/categories/{id}',['as'=>'account-categories','uses'=> 'AdminCategoryController@index']);*/
        // will fetch all users in the db
        Route::get('account/users',['as'=>'account-users','uses'=>'AdminAccountController@index']);
        // will fetch all comments in the db
        Route::get('account/comments',['as'=>'account-comments','uses'=>'AdminCommentController@index']);
        // to modify the contact us page
        Route::get('account/contactus',['as'=>'account-contactus','uses'=>'AdminContactUsController@edit']);
        // to modify the about us information
        Route::get('account/aboutus',['as'=>'account-aboutus','uses'=>'AdminAboutUsController@edit']);
        // create new post
        Route::get('account/post/create',['as'=>'account-post-create','uses'=>'AdminPostController@create']);
        // update existing post
        Route::get('account/post/edit/{id}',['as'=>'account-post-edit','uses'=>'AdminPostController@edit']);
        // to fetch all categories from the db
        Route::get('account/categories',['as'=>'account-categories','uses'=>'AdminCategoryController@index']);
        // to edit the category
        Route::get('account/categories/edit/{id}',['as'=>'account-categories-edit','uses'=>'AdminCategoryController@edit']);

        Route::group(['before'=>'csrf'], function () {
            // store + edit + delete
            Route::resource('post','PosController',['except'=>['index','create','update']]);
            // update about us
            Route::post('account/aboutus/update/{id}',['as'=>'account-aboutus-update','uses'=>'AdminAboutUsController@update']);
            // update contact us
            Route::post('account/contactus/update/{id}',['as'=>'account-contactus-update','uses'=>'AdminContactUsController@update']);
            // store a post
            Route::post('account/post/store',['as'=>'account-post-store','uses'=>'AdminPostController@store']);
            // delete a post
            Route::delete('account/post/destroy/{id}','AdminPostController@destroy');
            // delete a user
            Route::delete('account/user/destroy/{id}','AdminAccountController@destroy');
            // delete a comment
            Route::delete('account/comment/destroy/{id}','AdminCommentController@destroy');
            // delete a photo from the post.edit form
            Route::delete('account/photo/destroy/{id}','AdminPhotoController@destroy');
            // update user status {active or not active}
            Route::post('account/user/status/{id}','AdminAccountController@update');
            // update a post
            Route::post('account/post/update/{id}','AdminPostController@update');
            // update a category
            Route::post('account/category/update/{id}','AdminCategoryController@update');
        });


});