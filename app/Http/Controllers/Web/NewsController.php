<?php

namespace Sagmma\Http\Controllers\Web;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Article;
use Tag;
use Category;
use Carbon\Carbon;


class NewsController extends Controller
{
    public function __construct()
    {
        Carbon::setlocale('pt');
    }
    public function index()
    {
        // $articles = Article::take(5)->get();
        $articles = Article::where('status', true)->paginate(5);
        $articles->each(function ($articles)
        {
            $articles->category;
            $articles->images;
            // $articles->user;
        });

        // $featuresArticle = Article::where('status', true)->where('featured', true)->paginate(5);
        // $featuresArticle->each(function ($featuresArticle)
        // {
        //     $featuresArticle->category;
        //     $featuresArticle->images;
        //     // $featuresArticle->user;
        // });
        return view('_frontend.web.articlesPresentation.index')->with('articles', $articles);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    public function searchCategory($name)
    {
        $category = Category::SearchCategory($name)->first();
        $articles = $category->articles()->paginate(5);
        $articles->each(function ($articles)
        {
            $articles->category;
            $articles->images;
            // $articles->user;
        });
        return view('_frontend.web.articlesPresentation.index')->with('articles', $articles);
    }

    public function searchTag($name)
    {
        $tag = Tag::SearchTag($name)->first();
        $articles = $tag->articles()->paginate(5);
        $articles->each(function ($articles)
        {
            $articles->category;
            $articles->images;
            // $articles->user;
        });
        return view('_frontend.web.articlesPresentation.index')->with('articles', $articles);
    }

    public function viewArticle($slug)
    {
        $article = Article::findBySlugOrFail($slug);
        // $article = \Article::whereSlug($slug)->get();
        $article->category;
        // $article->user;
        $article->tags;
        $article->images;

        return view('_frontend.web.articlesPresentation.articleView')->with('article', $article);
    }
}
