<?php


class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
    public $post;
    public function __construct(Post $post) {
        $this->post = $post;
    }

	public function index()
	{
		// 1- to fetch last post added to the db
        $post = $this->post->with('categories')->orderBy('created_at','desc')->take(1);
        return View::make('site.home', compact('post'));

	}

}
