<?php

class AdminCategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admin/admincategory
	 *
	 * @return Response
	 */
    public $category;
    public function __construct(Category $category) {
        $this->category = $category;
    }
	public function index()
	{
		//
        /*$category = $this->category->all();*/
        // eagger loading
        $categories = $this->category->all();
        return View::make('admin.category.index',['categories' => $categories]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/admincategory/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin/admincategory
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /admin/admincategory/{id}
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
	 * GET /admin/admincategory/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$category = $this->category->find($id);
		return View::make('admin.category.edit',['category'=>$category]);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admin/admincategory/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$validator = Validator::make(Input::all(),Category::$categoryRulesUpdate);
		if($validator->passes()) {
			$categoryUpdate = $this->category->where('id','=',$id)->update(['name'=>Input::get('name'),'category_description'=>Input::get('category_description')]);
			if($categoryUpdate) {
				return Redirect::back()->with(['messages'=>'success','successMsg'=>'Category updated successfully']);
			}
			return Redirect::back()->with(['messages'=>'error', 'errorMsg'=> 'error occured .. category not updated ']);;
		}
		return Redirect::back()->withErrors($validator)->with(['messages'=>'error', 'errorMsg'=> 'please enter the info required properly']);;
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/admincategory/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}