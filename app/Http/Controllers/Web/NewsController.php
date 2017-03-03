<?php

namespace Sagmma\Http\Controllers\Web;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Article;
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
        $articles = Article::paginate(5);
        $articles->each(function ($articles)
        {
            $articles->category;
            $articles->images;
            // $articles->user;
        });
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
}
