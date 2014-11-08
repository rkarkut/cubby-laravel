<?php

class PagesController extends \BaseController 
{

    public function waitingList()
    {
        $categories = Category::where('user_id', Auth::id())->get();

        $links = Link::where(array('user_id' => Auth::id(), 'is_waiting' => 1))->paginate(15);
        return View::make('pages.waiting_list', array('links' => $links, 'categories' => $categories));
    }
}
