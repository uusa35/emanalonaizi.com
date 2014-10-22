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
        $realpath = $image->getRealPath();
        $createdPost->photos()->create(['path'=>$filename]);
        $imgThumbnail = Image::make($realpath)->resize('300')->save('public/uploads/thumbnail/'.$filename);
        $imageLarge = Image::make($realpath)->resize('600')->save('public/uploads/large/'.$filename);
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
	public function update($id)
	{
		//
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
	}

}