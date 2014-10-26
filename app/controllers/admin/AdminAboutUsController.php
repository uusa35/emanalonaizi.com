<?php

class AdminAboutUsController extends \BaseController {


    public $aboutus;
    public function __construct(Aboutus $aboutus) {
        $this->aboutus = $aboutus;
    }
    /**
	 * Display a listing of the resource.
	 * GET /adminaboutus
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        return View::make('admin.aboutus.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /adminaboutus/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /adminaboutus
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /adminaboutus/{id}
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
	 * GET /adminaboutus/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		//

        $aboutus = $this->aboutus->where('id' ,'=','1')->first();
        if($aboutus) {
            return View::make('admin.aboutus.edit', compact('aboutus'));
        }

        throw new NotFoundHttpException;
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /adminaboutus/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
        $validator = Validator::make(Input::all(), Aboutus::$updateRules);
        if($validator->fails()) {
            return Redirect::back()->withInput(Input::all())->withErrors($validator)->with('messages','error');
        }
        $aboutusUpdate = $this->aboutus->where('id','=','1')->first();
        $aboutusUpdate->title = Input::get('title');
        $aboutusUpdate->body = Input::get('body');
        if($aboutusUpdate->save()) {
            return Redirect::back()->with(['messages'=>'success','successMsg'=>Lang::get('messages.aboutus_success')]);
        }
        return Redirect::back()->with(['messages'=>'success','errorMsg'=>Lang::get('messages.aboutus_error')]);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /adminaboutus/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}