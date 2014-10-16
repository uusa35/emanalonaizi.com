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

        return 'send an email from this boing';

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