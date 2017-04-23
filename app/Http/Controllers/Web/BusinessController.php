<?php

namespace Sagmma\Http\Controllers\Web;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Product;
use Promotion;
use Auth;


class BusinessController extends Controller
{
    public function index()
    {
        // $lastProducts = Product::orderBy('created_at', 'desc')->take(2)->get();
        // $products = Product::all();
        //
        // foreach ($products as $product) {
        //     $prod_id[] = $product->id;
        // }
        // // dd($prod_id);
        //
        // $promotions = Promotion::wherehas('product', function($query)
        // {
        //     $query->where('user_id', '=', Auth::user()->id);
        // })->where('product_id', 'in', $prod_id)->get();
        // return $promotions;
        return view('_frontend.web.showPromotions.business');
    }

    public function create()
    {
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
