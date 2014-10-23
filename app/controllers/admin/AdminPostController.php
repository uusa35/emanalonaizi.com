<?php

use Lib\Validators\PhotoValidator as PhotoValidator;

class AdminPostController extends \BaseController {

    public $post;
    public $category;
    public function __construct(Post $post,Category $category) {
        $this->post = $post;
        $this->category = $category;
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
        $allPosts = $this->post->orderBy('created_at','DESC')->paginate(8);
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
        $categories = $this->category->all();
        $categories = $categories->lists('name', 'id');
        return View::make('admin.posts.create', compact('categories'));
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
        $validator = Validator::make(Input::all(),Post::$postRulesUpload);
        if($validator->passes()) {
            $images = Input::file('image');
            $this->post->create([
                'title'      => Input::get('title'),
                'body'       => Input::get('body'),
            ]);
            $createdPost = $this->post->orderBy('created_at','desc')->first();
            DB::table('category_post')->insert(['category_id'=>Input::get('category'),'post_id'=> $createdPost->id]);
            // plz go to app/events.php
            Event::fire('post.create',[$createdPost,$images]);
            return Redirect::back()->with(['messages'=>'success','successMsg'=>'Post Created with Images Uploaded :)']);
        }
        return Redirect::back()->withErrors($validator)->with(['messages'=>'error', 'errorMsg'=> Lang::get('messages.upload_error')]);
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

        $deletedPost = $this->post->find(Input::get('post_id'));
        $deletedPost = $deletedPost->delete();


        return Redirect::back()->with(['messages'=>'success','successMsg'=>'deleted']);


	}

}