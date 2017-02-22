<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\WebRequests\ArticlesRequest;
use Article;
use Category;
use Tag;
use User;
use Response;
use Input;
use Auth;

class ApiArticlesController extends Controller
{
    public function index()
    {
        $article = Article::paginate(10);
        $article->each(function($article){
            $article->tags;
            $article->categories;
        });
        return $article;
    }

    public function create()
    {}

        public function store(ArticlesRequest $request)
        {
            $article              = new Article();
            $article->title       = $request->title;
            $article->content     = $request->content;
            $article->status      = false;
            $article->featured    = false;
            $article->user_id     = Auth::user()->id;
            $article->category_id = $request->category_id;
            $article->save();
            $article->tags()->sync($request->tags);
        }


        public function show($id)
        {
            $article = Article::findOrFail($id);
            return $article;
        }

        public function edit($id)
        {
            //
        }

        public function update(Req $request, $id)
        {
            Article::findOrFail($id)->update($request::all());
            return Response::json($request::all());

        }

        public function destroy($id)
        {
            return Article::destroy($id);
        }

        // -------------------------------------------------------------
        public function articleStatus(Request $request)
        {
            $id  = $request->id;
            $article = Article::find($id);
            if ($article->status == true) {
                $article->status = false;
            }else {
                $article->status = true;
            }
            $article->save();
            return response($article, 200);
        }

        public function articleFeatures(Request $request)
        {
            $id  = $request->id;
            $article = Article::find($id);
            if ($article->featured == true) {
                $article->featured = false;
            }else {
                $article->featured = true;
            }
            $article->save();
            return response($article, 200);
        }
        // ----------------------------------------------------------

        public function getCategoryForArticle()
        {
            $category = Category::all();
            return $category;
        }

        public function getUserForArticle()
        {
            $user = User::all();
            return $user;
        }

        public function getTagForArticle()
        {
            $tag = Tag::all();
            return $tag;
        }
    }
