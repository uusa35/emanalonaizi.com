<?php

class AdminPhotoController extends \BaseController {


    public $photo;
    public function __construct(Photo $photo) {
       $this->photo = $photo;
    }
	/**
	 * Display a listing of the resource.
	 * GET /admin/adminphoto
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/adminphoto/create
	 *
	 * @return Response
	 */
	public function create($createdPost,$images)
	{
        foreach($images as $image)  {
        $filename = $image->getClientOriginalName();
        $filename = Str::random(5).''.$filename;
        $realpath = $image->getRealPath();
        $validator = Validator::make([$image],Photo::$uploadRules);
            if($validator->fails()) {
                return Redirect::back()->with(['messages'=>'error','errorMsg'=> 'upload failure ']);
            }
            $imgThumbnail = Image::make($realpath)->resize('200','200')->save(public_path('uploads/thumbnail/'.$filename));
            $imageLarge = Image::make($realpath)->resize('500','500')->save(public_path('uploads/large/'.$filename));
            $createdPost->photos()->create(['path'=>$filename]);
        }

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin/adminphoto
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /admin/adminphoto/{id}
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
	 * GET /admin/adminphoto/{id}/edit
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
	 * PUT /admin/adminphoto/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($updatedPost,$images)
	{
		//
        foreach($images as $image)  {
            $filename = $image->getClientOriginalName();
            $realpath = $image->getRealPath();
            $validator = Validator::make([$image],Photo::$uploadRules);
            if($validator->fails()) {
                return Redirect::back()->with(['messages'=>'error','errorMsg'=> 'upload failure ']);
            }
            $imgThumbnail = Image::make($realpath)->resize('200','200')->save(public_path('uploads/thumbnail/'.$filename));
            $imageLarge = Image::make($realpath)->resize('500','500')->save(public_path('uploads/large/'.$filename));
            $updatedPost->photos()->update(['path'=>$filename]);
        }

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/adminphoto/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        $deletedPhoto = $this->photo->find($id);
        if($deletedPhoto->delete()) {
        return Redirect::back()->with(['message'=>'success','successMsg'=>'Photo has been deleted successfully']);
        }

	}

    public function postPhotoDelete($post_id) {

        $deletedPhoto = $this->photo->where('post_id' , '=', $post_id);
        if($deletedPhoto) {
            $deletedPhoto->delete();
        }
        return Redirect::back()->with(['message'=>'error','errorMsg'=>'Photo has not been deleted !!!']);
    }


}