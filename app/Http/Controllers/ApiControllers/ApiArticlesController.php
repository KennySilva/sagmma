<?php

namespace Sagmma\Http\Controllers\ApiControllers;
use Sagmma\Http\Requests\WebRequests\ArticlesRequest;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Article;
use Category;
use Tag;
use User;
use Response;
use Input;
use Auth;
use Image;
use Session;
use Config;

class ApiArticlesController extends Controller
{
    public function _construct()
    {
        config('globalVariable.test1');
    }

    public function index()
    {

        $article = Article::paginate();
        $article->each(function($article){
            $article->tags;
            $article->categories;
        });
        return $article;
    }


    public function articlesShow($showRow)
    {
        $article = Article::paginate($showRow);
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
            // -------------------------------------------------
            // -------------------------------------------------
            $image = new Image();
            $image->name = "nome3";
            $image->description = "";
            // $image->article_id = 4;
            $image->article()->associate($article);
            //----------------------
            $image->save();

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

        public function test1()
        {
            // global $jabberwocky;
            // $jabberwocky="Jabberwocky";
            // test2();
            // $GLOBALS['myGlobalVariable'] = 42;
            // session()->put('global', 'test1');
            // $this->global = "Dentrop"
            $value ='Terra sabi';

            config('globalVariable.test1', $value);
        }

        public function test2()
        {
            // global $jabberwocky;
            // dd($GLOBALS['myGlobalVariable']);
            // Config::set('globalVariable.test1', 'sola');

            dd(config('globalVariable.test1'));
        }





        //-----------------------------------------------------------
        public function uploadImage(Request $request)
        {
            if ($request->file('articleimage')) {
                $file = $request->file('articleimage');
                $name = 'proj_teste_'.time().'.'.$file->getClientOriginalExtension();
                $path = public_path().'/uploads/uploadsImages/articles/';
                $file->move($path, $name);
                global $nameNeeded;
                $nameNeeded = $name;
            }
        }



    }
