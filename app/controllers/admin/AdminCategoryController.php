<?php

class AdminCategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admin/admincategory
	 *
	 * @return Response
	 */
    public $category;
    public function __construct(Category $category) {
        $this->category = $category;
    }
	public function index()
	{
		//
        /*$category = $this->category->all();*/
        // eagger loading
        $allPosts = $this->category->posts()->with('photos')->paginate(2);
        return View::make('admin.category.index',['posts' => $allPosts]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/admincategory/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin/admincategory
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /admin/admincategory/{id}
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
	 * GET /admin/admincategory/{id}/edit
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
	 * PUT /admin/admincategory/{id}
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
	 * DELETE /admin/admincategory/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}