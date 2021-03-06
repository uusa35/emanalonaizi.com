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

	public function index($id='')
	{
		//
        $categories = $this->category->where('id','!=','10')->get();
        $categories = $categories->lists('name', 'id');
        if (!$id) {
            $allPosts = $this->post->orderBy('created_at','DESC')->paginate(12);
        }
        else {
            $allPosts = $this->category->find($id)->posts()->orderBy('created_at','desc')->paginate(5);
        }
        return View::make('admin.posts.index',['posts'=>$allPosts,'categories'=>$categories]);
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
        $categories = $this->category->get();
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
            $createdPost = $this->post->create([
                'title'      => Input::get('title'),
                'body'       => Input::get('body'),
            ]);
            /*$createdPost = $this->post->orderBy('created_at','desc')->first();*/
            if ($createdPost) {
            DB::table('category_post')->insert(['category_id'=>Input::get('category'),'post_id'=> $createdPost->id]);
            // plz go to app/events.php
                if($images[0] != NULL) {
                    Event::fire('post.create',[$createdPost,$images]);
                }
            return Redirect::back()->with(['messages'=>'success','successMsg'=>'Post Created with Images Uploaded :)']);
            }
            return Redirect::back()->withErrors($validator)->with(['messages'=>'error', 'errorMsg'=> Lang::get('messages.upload_error')]);
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
        $post = $this->post->find($id);
        // get all categories from the DB
        $categoriesList = $this->category->get();
        $photos = $post->load('photos');
        // get the related category for the edited post
        $categorySelected = $post->categories()->first();
        // list all categories
        $categoriesList = $categoriesList->lists('name', 'id');
        return View::make('admin.posts.edit', compact('post','categorySelected','categoriesList','photos'));
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
        $validator = Validator::make(Input::all(),Post::$postRulesUpload);
        if($validator->passes()) {
            $images = Input::file('image');
            $post = $this->post->where('id','=',$id)->update([
                'title'      => Input::get('title'),
                'body'       => Input::get('body'),
            ]);
           if($post) {
               $updatedPost = $this->post->find($id);
                DB::table('category_post')->where('post_id','=',$id)->update(['category_id'=>Input::get('category')]);
                // plz go to app/events.php
                if($images[0] != NULL) {
                    Event::fire('post.create',[$updatedPost,$images]);
                }
           }
            return Redirect::back()->with(['messages'=>'success','successMsg'=>'Post updated with Images Uploaded :)']);
        }
        return Redirect::back()->withErrors($validator)->with(['messages'=>'error', 'errorMsg'=> Lang::get('messages.upload_error')]);


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
        Event::fire('photo.delete',['post_id'=> $id]);
        $deletedPost = $deletedPost->delete();
        return Redirect::back()->with(['messages'=>'success','successMsg'=>'deleted']);


	}

}