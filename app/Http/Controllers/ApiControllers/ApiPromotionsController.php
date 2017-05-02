<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\SagmmaRequests\PromotionsRequest;
use Promotion;
use Product;
use Trader;
use Response;
use Input;
use Auth;
use Carbon\Carbon;

class ApiPromotionsController extends Controller
{
    public function index($row)
    {
        $this->promotionStatusChange();

        foreach (Auth::user()->roles as $role) {
            $role = $role->name;
            if ($role == 'super-admin' || $role == 'admin' || $role == 'dpel' || $role == 'manager') {
                $promotion = Promotion::paginate($row);

            }else{
                $promotion = Promotion::where(function ($query) {$query->whereHas('product', function($q){
                    $q->where('author', '=', Auth::user()->name);
                });})->paginate($row);
            }
        }
        $promotion->each(function($promotion){
            $promotion->product;
            $promotion->trader;
        });
        return $promotion;
    }

    public function create()
    {
        //
    }

    public function store(PromotionsRequest $request)
    {

        $promotion                = new Promotion();
        $promotion->name          = $request->name;
        $promotion->description   = $request->description;
        $promotion->begnning_date = $request->begnning_date;
        $promotion->ending_date   = $request->ending_date;
        $promotion->trader_id     = $request->trader_id;
        $promotion->product_id    = $request->product_id;
        $promotion->status        = false;
        $promotion->save();

    }


    public function show($id)
    {
        $promotion = Promotion::findOrFail($id);
        return $promotion;
    }

    public function edit($id)
    {
        //
    }

    public function update(PromotionsRequest $request, $id)
    {


        $promotion                = Promotion::findOrFail($id);
        $promotion->name          = $request->name;
        $promotion->description   = $request->description;
        $promotion->begnning_date = $request->begnning_date;
        $promotion->ending_date   = $request->ending_date;
        $promotion->trader_id     = $request->trader_id;
        $promotion->product_id    = $request->product_id;
        $promotion->save();
    }

    public function destroy($id)
    {
        return Promotion::destroy($id);
    }

    public function deleteAll($ids)
    {
        Promotion::destroy(explode(',', $ids));
    }


    //Metodos de auxilio
    public function getProductForPromotion()
    {
        foreach (Auth::user()->roles as $role) {
            $role = $role->name;
            if ($role == 'super-admin' || $role == 'admin' || $role == 'dpel' || $role == 'manager') {
                $products = Product::all();
            }else{
                $products = Product::where('author', '=', Auth::user()->name)->get();
            }
        }
        return $products;

    }
    public function getTraderForPromotion()
    {
        foreach (Auth::user()->roles as $role) {
            $role = $role->name;
            if ($role == 'super-admin' || $role == 'admin' || $role == 'dpel' || $role == 'manager') {
                $trader = Trader::all();
            }else{
                $trader = Trader::where('ic', '=', Auth::user()->ic)->get();
            }
        }
        return $trader;
    }


    public function statusPromotionsChange(Request $request)
    {
        $id  = $request->id;
        $promotion = Promotion::find($id);
        if ($promotion->status == true) {
            $promotion->status = false;
        }else {
            $promotion->status = true;
        }
        $promotion->save();
        return response($promotion, 200);
    }

    public function promotionStatusChange()
    {
        $promotions = Promotion::all();
        foreach ($promotions as $promo) {
            if ($promo->ending_date < Carbon::today()->toDateTimeString()) {
                $promo->status = 0;
                $promo->save();
            }
        }
    }




}
