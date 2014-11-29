<?php

class Commentcontroller extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /commentcontroller
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /commentcontroller/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /commentcontroller
	 *
	 * @return Response
	 */
	public function postComment($post_id,$user_id)
	{
		//
        $validator = Validator::make([
            'title' =>Input::get('title'),
            'body'  =>Input::get('body')
        ],Comment::$rules);
        if($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator)->with(['messages'=>'error']);
        }
        $comment = Comment::create([
                    'title'     => Input::get('title'),
                    'body'      => Input::get('body'),
                    'post_id'   => $post_id,
                    'user_id'   => $user_id
                    ]);
        return Redirect::back()->with('success',Lang::get('messages.comment_success'))->with(['messages'=>'success','successMsg'=>Lang::get('messages.comment_success')]);
	}

	/**
	 * Display the specified resource.
	 * GET /commentcontroller/{id}
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
	 * GET /commentcontroller/{id}/edit
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
	 * PUT /commentcontroller/{id}
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
	 * DELETE /commentcontroller/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function posts() {
        return $this->belongsTo('Comment');
    }

}