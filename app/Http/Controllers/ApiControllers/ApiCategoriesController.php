<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\WebRequests\CategoriesRequest;
use Category;
use Response;
use Input;

class ApiCategoriesController extends Controller
{
    public function index()
    {
        return Category::paginate(10);
    }
    
    public function create()
    {}

        public function store(categoriesRequest $request)
        {
            $category              = new Category($request->all());
            $category->name        = $request->name;
            $category->description = $request->description;
            $category->save();
        }


        public function show($id)
        {
            $category = Category::findOrFail($id);
            return $category;
        }

        public function edit($id)
        {
            //
        }

        public function update(Req $request, $id)
        {
            Category::findOrFail($id)->update($request::all());
            return Response::json($request::all());

        }

        public function destroy($id)
        {
            return Category::destroy($id);
        }
    }
