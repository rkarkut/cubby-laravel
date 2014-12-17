<?php
class BaseController extends Controller
{
    private $categoriesTree = array();

    public function __construct()
    {
        $this->getCategoriesRecursively(0, 1);
        View::share('_categories', $this->categoriesTree);
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

    /**
     * Get categories recursevely.
     *
     * * @param $parentId
     * @param $depth
     *
     */
    private function getCategoriesRecursively($parentId, $depth)
    {
        $categories = Category::where(array('user_id' => Auth::id(), 'parent_id' => $parentId))->orderBy('created_at', 'desc')->get();

        if(empty($categories)) {
            return;
        }

        foreach($categories as $category) {
            $category->depth = $depth;
            $this->categoriesTree[] = $category;

            $this->getCategoriesRecursively($category->id, ($depth+1));
        }
    }
}
