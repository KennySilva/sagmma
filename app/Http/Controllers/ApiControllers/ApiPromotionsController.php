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

class ApiPromotionsController extends Controller
{
    public function index()
    {
        $promotion = Promotion::paginate(5);
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
        // if (Auth::user()->type=='Comerciante') {
        //     $promotion->trader_id = Auth::user()->id;
        // }
        $promotion                = new Promotion($request->all());
        $promotion->name          = $request->name;
        $promotion->description   = $request->description;
        $promotion->photo         = $request->photo;
        $promotion->begnning_date = $request->begnning_date;
        $promotion->ending_date   = $request->ending_date;
        $promotion->trader_id     = $request->trader_id;
        $promotion->product_id    = $request->product_id;
        $promotion->status    = $request->status;
        // $promotion->author        = Auth::user()->name;
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

    public function update(Req $request, $id)
    {
        Promotion::findOrFail($id)->update($request::all());
        return Response::json($request::all());

    }

    public function destroy($id)
    {
        return Promotion::destroy($id);
    }


    //Metodos de auxilio
    public function getProductForPromotion()
    {
        $product = Product::all();
        return $product;
    }
    public function getTraderForPromotion()
    {
        //
        // if (Auth::user()->type=='Comerciante') {
        //     $trader = Auth::user();
        // }else {
        //     $trader = Trader::all();
        // }
        $trader = Trader::all();
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


}
