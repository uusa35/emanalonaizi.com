<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
    //echo '<h1>'.App::environment().'</h1>';
    View::composer(['site.layouts._one_col','site.home'], function($view)
    {
        	// remember categories for 24 hours
    		// cache::remember --> if (statement) cache does not have categories .. then it will load otherwise it will procceed
        if(!Cache::has('categories')) {
        Cache::put('categories', Category::all(), 0);
        }
        // will make the cache here for categories
        $categories = Cache::get('categories');
        $view->with('categories' , $categories);
    });
    View::composer(['site.partials.footer'], function($view) {
        if(!Cache::has('socialMedia')) {
            Cache::put('socialMedia',Contactus::find(1),15);
        }
        $socialMedia = Cache::get('socialMedia');
        $view->with('socialMedia',$socialMedia);
    });
});


App::after(function($request, $response)
{
	//

});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

/*
 * Admin Filter
 * */

Route::filter('admin', function()
{
    if (! Auth::user()->username === 'admin')
    {
        App::abort(403, 'Unauthorized action.');
    }
});
