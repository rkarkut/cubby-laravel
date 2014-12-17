<?php
use Sunra\PhpSimple\HtmlDomParser;

class LinksController extends \BaseController
{
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        //
        
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
        $currentCategory = Input::get('current_category');
        
        if (empty($currentCategory)) {
            throw new Exception('Incorrect cutegory during creating new link.');
        }
        
        $rules = array('url' => 'required|unique:links',);
        
        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails()) {
            
            return Redirect::route('categories.show', array('id' => $currentCategory))->withErrors($validator);
        }
        
        $url = Input::get('url');
        $url = substr($url, 0, 4) == 'http' ? $url : 'http://' . $url;
        
        $link = new Link();
        $link->title = Input::get('title');
        $link->url = $url;
        $link->category_id = Input::get('category');
        $link->user_id = Auth::id();
        
        $link->save();
        
        return Redirect::route('categories.show', array('id' => $currentCategory))->with('success', 'Link has been added.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $link = Link::find($id);
        return Redirect::to($link->url);
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
        $link = Link::find($id);
        $link->delete();
        
        return Redirect::route('categories.index')->with('success', 'Link has been removed');
    }
    
    public function getSiteTitle()
    {
        if (Request::ajax() == false) {
            return Redirect::route('home.index');
        }
        
        if (Request::has('url') == false) {
            return Redirect::route('home.index');
        }
        
        $url = Request::get('url');
        
        $url = substr($url, 0, 7) == 'http://' ? $url : 'http://' . $url;
        
        $html = HtmlDomParser::file_get_html($url);
        $title = $html->find('title', 0)->innertext;
        
        return Response::json(array('title' => $title));
    }
    
    public function addToWaitingList()
    {
        if (Request::ajax() == false) {
            return Redirect::route('home.index');
        }
        
        if (Request::has('id') == false) {
            return Redirect::route('home.index');
        }
        
        $id = Request::get('id');
        
        $link = Link::find($id);
        
        if (empty($link)) {
            return Redirect::route('home.index');
        }

        if($link->is_waiting == 1) {
            $link->is_waiting = 0;
        } else {
            $link->is_waiting = 1;
        }

        $link->save();

        return Response::json(array('status' => 'true'));
    }

    public function getByName()
    {
        if (Request::ajax() == false) {
            return Response::json(array('Not AJAX Request'));
        }

        $search = Request::get('search');
        $categoryId = Request::get('category_id');

        if (empty($search)) {

            if (empty($categoryId)) {
                $links = Link::where(array('user_id' => Auth::id()))->get();
            } else {
                $links = Link::where(array('user_id' => Auth::id(), 'category_id' => $categoryId))->get();
            }                
        } else {

            if (empty($categoryId)) {
                $links = Link::where('title', 'LIKE', '%'.$search.'%')->where(array('user_id' => Auth::id()))->get();
            } else {
                $links = Link::where('title', 'LIKE', '%'.$search.'%')->where(array('user_id' => Auth::id(), 'category_id' => $categoryId))->get();
            }
        }

        $html = '';

        if ((int) $links->count() == 0) {

            $html = '<div class="alert alert-danger">Results not found</div>';
        }

        foreach ($links as $link) {

            $html .= View::make('partials.link', array('link' => $link));
        }

        return Response::json(array('html' => $html));
    }
}
