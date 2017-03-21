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
use Settings;
use Intervention\Image\ImageManagerStatic as Image;


class ApiProductsController extends Controller
{
    public function index($row)
    {
        return Product::paginate($row);
    }

    public function create()
    {

    }

    public function store(ProductsRequest $request)
    {
        $photo = Settings::get('name');
        $product              = new Product($request->all());
        $product->name        = $request->name;
        $product->price       = $request->price;
        $product->photo       = $photo;
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

    public function uploadImage(Request $request)
    {

        if ($request->hasFile('productimage')) {
            $photo = $request->file('productimage');
            $photoname = time().'.'.$photo->getClientOriginalExtension();
            $img = Image::make($photo);
            $img->resize(300, 300);
            $img->save(public_path('/uploads/uploadsImages/products/'.$photoname));
            Settings::set('name', $photoname);
        }
    }
}
