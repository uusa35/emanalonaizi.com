<?php

class CategoryController extends \BaseController {


    public $category;
    public $comment;
    public function __construct(Category $category, Comment $comment) {
        $this->category = $category;
        $this->comment = $comment;
    }
    /**
	 * Display a listing of the resource.
	 * GET /category
	 *
	 * @return Response
	 */
	public function index($categoryId)
	{
		//

        $category = $this->category->find($categoryId);
        // eagger loading
        $posts = $category->posts()->orderBy('created_at','desc')->with('photos')->paginate(5);
        return View::make('site.category.index',compact('posts','category'));

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /category/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /category
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /category/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}