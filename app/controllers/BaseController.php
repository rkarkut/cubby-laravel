<?php
class BaseController extends Controller
{
    public function __construct()
    {
        $categories = Auth::check() ? Category::where(array('user_id' => Auth::id()))->get() : array();
        View::share('_categories', $categories);
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }
}
