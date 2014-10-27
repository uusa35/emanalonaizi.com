<?php

class AdminCommentController extends \BaseController {

    public $comment;
    public function __construct (Comment $comment) {
        $this->comment = $comment;
    }
	/**
	 * Display a listing of the resource.
	 * GET /admincomment
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $comments = $this->comment->orderBy('created_at','DESC')->with(['user'])->paginate(10);
        return View::make('admin.comments.index', compact('comments'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admincomment/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admincomment
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /admincomment/{id}
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
	 * GET /admincomment/{id}/edit
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
	 * PUT /admincomment/{id}
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
	 * DELETE /admincomment/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        $deletedComment = $this->comment->find(Input::get('comment_id'))->delete();
        return Redirect::back()->with(['messages'=>'success','successMsg'=> Lang::get('messages.delete')]);
	}

}