<?php

class AdminAccountController extends \BaseController {

    public $guarded = [];
    public $user;
    public function __construct(User $user) {
        $this->user = $user;
    }
	/**
	 * Display a listing of the resource.
	 * GET /adminaccount
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $users = $this->user->where('id','!=','1')->paginate(10);
        return View::make('admin.users.index',compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /adminaccount/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /adminaccount
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /adminaccount/{id}
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
	 * GET /adminaccount/{id}/edit
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
	 * PUT /adminaccount/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
            // boolean 1 or 0
            $status = Input::get('status');
            $activateUser = $this->user->find(Input::get('user_id'));
            $activateUser->active = Input::get('status');
            if($activateUser->update()) {
                return Redirect::back()->with(['messages'=>'success','successMsg'=>Lang::get('messages.activated_success')]);
            }
            return Redirect::back()->with(['messages'=>'error','errorMsg'=>Lang::get('messages.activated_success')]);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /adminaccount/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        $deleteUser = $this->user->find(Input::get('user_id'))->delete();
        return Redirect::back()->with(['messages'=>'success','successMsg'=>Lang::get('messages.delete')]);
	}

    public function deactivateUser() {

    }

}