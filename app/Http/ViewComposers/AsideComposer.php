<?php
namespace Sagmma\Http\ViewComposers;
use Illuminate\Contracts\View\View;
use Category;
use Tag;

class AsideComposer {
    public function compose(View $view)
    {
        $categories = Category::orderBy('name', 'desc')->get();
        $tags = Tag::orderBy('name', 'desc')->get();
        $view->with('categories', $categories)->with('tags', $tags);
    }
}
?>
