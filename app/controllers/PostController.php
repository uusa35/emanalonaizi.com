<?php

class PostController extends \BaseController {



    public $comment;
    public $post;
    public function __construct(Post $post,Comment $comment) {
        $this->comment = $comment;
        $this->post = $post;
    }

	/**
	 * Display a listing of the resource.
	 * GET /post
	 *
	 * @return Response
	 */
	public function index($categoryId)
	{
		//


	}

	/**
	 * Show the form for creating a new resource.
	 * GET /post/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /post
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		// this will depend on comments and photos :: relation ship to be made
        $post = $this->post->find($id);
        $post = $post->load('photos');
        $comments = $this->comment->where('post_id','=',$id)->with('user')->paginate(5);
        return View::make('site.posts.show',compact('post','comments'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /post/{id}/edit
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
	 * PUT /post/{id}
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
	 * DELETE /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function getCommentPage($categoryId) {
        $post = $this->post->where('id','=','1')->first();
        $category = Category::find($categoryId);
        $comments = $this->comment->where('post_id','=','1')->with('user')->paginate(8);
        return View::make('site.posts.show',compact('post','comments','category'));

    }
}