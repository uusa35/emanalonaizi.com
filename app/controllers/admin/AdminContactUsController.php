<?php

class AdminContactUsController extends \BaseController {



    public $contactus;
    public function __construct(Contactus $contactus) {
        $this->contactus = $contactus;
    }
	/**
	 * Display a listing of the resource.
	 * GET /admincontactus
	 *
	 * @return Response
	 */
	public function index()
	{
		//

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admincontactus/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admincontactus
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /admincontactus/{id}
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
	 * GET /admincontactus/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		//
        $info = $this->contactus->where('id' ,'=','1')->first();
        if($info) {
            return View::make('admin.contactus.edit', compact('info'));
        }
        throw new NotFoundHttpException;
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admincontactus/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
        $infoUpdate = $this->contactus->where('id','=','1')->first();

        if($infoUpdate) {
            $validator = Validator::make(Input::all(),Contactus::$rulesUpdate);

            if($validator->fails()) {
                return Redirect::back()->withInput(Input::all())->withErrors($validator)->with('messages','error');
                return Redirect::back()->with(['messages'=>'error'])->withInput(Input::all())->withErrors($validator);
            }
            $infoUpdate = $this->contactus->update(Input::except('_token'));
            if($infoUpdate) {
                return Redirect::back()->with(['messages'=>'success','successMsg'=> Lang::get('messages.contactus_success')]);
            }
        }
        return Redirect::back()->with(['messages'=>'error','errorMsg'=> Lang::get('messages.contactus_error')]);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admincontactus/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}