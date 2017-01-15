<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\SagmmaRequests\TradersRequest;
use Trader;
use Typeoftrader;
use Product;
use Response;
use Input;

class ApiTradersController extends Controller
{
    public function index()
    {



        $trader = Trader::paginate(5);

        // $trader->each(function($trader){
        //     $trader->product;
        //     $trader->typeoftraders;
        // });
        return $trader;
    }

    public function create()
    {}

        public function store(TradersRequest $request)
        {
            $trader                  = new Trader($request->all());
            $trader->name            = $request->name;
            $trader->ic              = $request->ic;
            $trader->age             = $request->age;
            $trader->gender          = $request->gender;
            $trader->email           = $request->email;
            $trader->state           = $request->state;
            $trader->council         = $request->council;
            $trader->parish          = $request->parish;
            $trader->zone            = $request->zone;
            $trader->phone           = $request->phone;
            // $trader->status          = $request->status;
            $trader->photo           = $request->photo;
            $trader->description     = $request->description;
            // $trader->product_id      = $request->product_id;
            // $trader->typeoftrader_id = $request->typeoftrader_id;
            $trader->save();

        }


        public function show($id)
        {
            $trader = Trader::findOrFail($id);
            return $trader;
        }

        public function edit($id)
        {
            //
        }

        public function update(Req $request, $id)
        {
            Trader::findOrFail($id)->update($request::all());
            return Response::json($request::all());

        }

        public function destroy($id)
        {
            return Trader::destroy($id);
        }

        public function getProductforTrader()
        {
            $product = Product::all();
            return $product;


        }

        public function getTypeForTrader()
        {
            $typeoftrader = Typeoftrader::all();
            return $typeoftrader;
        }
    }
