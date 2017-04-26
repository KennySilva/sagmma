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
        foreach (Auth::user()->roles as $role) {
            $role = $role->name;
            if ($role == 'super-admin' || $role == 'admin' || $role == 'dpel' || $role == 'manager') {
                $products = Product::orderBy('created_at', 'desc')->take(5)->get();
                $promotions = Promotion::take(5)->get();
                $promotionAtived = Promotion::orderBy('created_at', 'desc')->where('status', 1)->get();
            }else{
                $products = Product::orderBy('created_at', 'desc')->where('author', '=', Auth::user()->name)->take(5)->get();
                $promotions = Promotion::orderBy('created_at', 'desc')->where(function ($query) {$query->whereHas('product', function($q){
                    $q->where('author', '=', Auth::user()->name);
                });})->take(5)->get();

                $promotionAtived = Promotion::where(function ($query) {$query->whereHas('product', function($q){
                    $q->where('author', '=', Auth::user()->name);
                });})->where('status', 1)->get();
            }
        }
        return view('_frontend.web.showPromotions.business')->with('products', $products)->with('promotions', $promotions)->with('promotionAtived', $promotionAtived);
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
