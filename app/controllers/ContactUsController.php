<?php

class ContactUsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /contactus
	 *
	 * @return Response
	 */
	public function index()
	{
		//
       $contact = Contactus::first();
        /*echo '<pre>';
        dd($contact->toArray());*/
       return  View::make('site.contactus.index',compact('contact'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /contactus/create
	 *
	 * @return Response
	 */
	public function contact()
	{
		//
        $validator = Validator::make(Input::all(),Contactus::$rules);

        if($validator->fails()) {
            Input::get('body');
            return Redirect::to('/contactus')->with('messages','error')->withErrors($validator);
        }
        $sender_name = Input::get('sender_name');
        $sender_email = Input::get('sender_email');
        $body = Input::get('body');
        Mail::queue('emails.contactus',['sender_email'=>$sender_email,'sender_name'=>$sender_name, 'body'=>$body], function($message) use ($sender_name){
            $message->to('uusa35@gmail.com', 'Test Name from Inside ContactUs Controller')->subject('Contact Us | Eman Al-Onaizi Blog | from | '. $sender_name);
        });
        return Redirect::to('/contactus')->with(['messages'=>'success','successMsg'=>Lang::get('messages.email_success')]);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /contactus
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /contactus/{id}
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
	 * GET /contactus/{id}/edit
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
	 * PUT /contactus/{id}
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
	 * DELETE /contactus/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}