<?php

class CategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $categories = Category::where('user_id', Auth::id())->paginate(10);
		return View::make('categories.index', array('categories' => $categories));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{    
        $rules = array(
            'name' => 'required|unique:categories',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {

            return Redirect::route('categories.index')->withErrors($validator);
        }
        $category = new Category();
        $category->name = Input::get('name');
        $category->user_id = Auth::id();

        $category->Save();

        return Redirect::route('categories.index')->with('success', 'Category has been saved');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $category = Category::find($id);
        $links = Link::where(array('category_id' => $id, 'user_id' => Auth::id()))->paginate(15);

		return View::make('categories.show', array(
            'category' => $category,
            'links' => $links
        ));
	}


	/**
	 * Show the form for editing the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category = Category::find($id);
        $category->delete();

        return Redirect::route('categories.index')->with('success', 'Category has been removed');
	}

    public function getByName()
    {
        if (Request::ajax() == false) {
            return Response::json(array('Not AJAX Request'));
        }

        $search = Request::get('search');

        if (empty($search)) {

            $categories = Category::where(array('user_id' => Auth::id()))->get();
        } else {

            $categories = Category::where('name', 'LIKE', '%'.$search.'%')->where(array('user_id' => Auth::id()))->get();
        }

        $html = '';

        if ((int) $categories->count() == 0) {

            $html = '<div class="alert alert-danger">Results not found</div>';
        }

        foreach ($categories as $category) {

            $html .= View::make('partials.category', array('category' => $category));
        }

        return Response::json(array('html' => $html));
    }

}
