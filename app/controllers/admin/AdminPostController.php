<?php

class AdminPostController extends \BaseController {

    public $post;
    public function __construct(Post $post) {
        $this->post = $post;
    }

	/**
	 * Display a listing of the resource.
	 * GET /adminpost
	 *
	 * @return Response
	 */

	public function index()
	{
		//
        $allPosts = $this->post->paginate(10);
        return View::make('admin.posts.index',['posts'=>$allPosts]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /adminpost/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /adminpost
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /adminpost/{id}
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
	 * GET /adminpost/{id}/edit
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
	 * PUT /adminpost/{id}
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
	 * DELETE /adminpost/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}