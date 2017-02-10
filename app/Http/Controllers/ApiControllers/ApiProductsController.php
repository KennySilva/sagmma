<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\SagmmaRequests\ProductsRequest;
use Product;
use Response;
use Input;

class ApiProductsController extends Controller
{
    public function index()
    {
        return Product::paginate(5);
    }

    public function create()
    {

    }

    public function store(ProductsRequest $request)
    {
        $product              = new Product($request->all());
        $product->name        = $request->name;
        $product->price       = $request->price;
        $product->photo       = $request->photo;
        $product->description = $request->description;
        $product->author      = \Auth::user()->name;
        $product->save();
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return $product;
    }

    public function edit($id)
    {
        //
    }

    public function update(Req $request, $id)
    {
        Product::findOrFail($id)->update($request::all());
        return Response::json($request::all());

    }

    public function destroy($id)
    {
        return Product::destroy($id);
    }


}
