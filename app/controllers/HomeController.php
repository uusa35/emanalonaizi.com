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

    public $category;
    public function __construct(Category $category) {
        $this->category = $category;
    }

	public function index()
	{
		// 1- to fetch last post added to the db
        $post = Post::orderBy('created_at','DESC')->first();

		// 2- to fetch all categories from the db
        $categories = $this->category->all();

        return View::make('site.home', compact('post','categories'));

	}

}
