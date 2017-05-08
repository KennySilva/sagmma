<?php
namespace Sagmma\Http\ViewComposers;
use Illuminate\Contracts\View\View;
use Category;
use Tag;
use Article;

class AsideComposer {
    public function compose(View $view)
    {
        $categories = Category::orderBy('name', 'desc')->get();
        $tags = Tag::orderBy('name', 'desc')->get();

        $featuresArticle = Article::where('status', true)->where('featured', true)->paginate(5);
        $featuresArticle->each(function ($featuresArticle)
        {
            $featuresArticle->category;
            $featuresArticle->images;
            // $featuresArticle->user;
        });
        $view->with('categories', $categories)->with('tags', $tags)->with('featuresArticle', $featuresArticle);
    }
}
?>
