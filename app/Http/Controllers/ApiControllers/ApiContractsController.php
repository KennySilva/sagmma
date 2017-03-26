<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\SagmmaRequests\ContractsRequest;
use Contract;
use Place;
use Trader;
use Response;
use Input;
use Auth;

class ApiContractsController extends Controller
{
    public function index($row)
    {
        $contract = Contract::paginate($row);
        $contract->each(function($contract){
            $contract->places;
            $contract->traders;
        });
        return $contract;
    }

    public function create()
    {

    }

    public function store(ContractsRequest $request)
    {

        $contract            = new Contract($request->all());
        $place = Place::where('id', '=', $request->place_id)->first();
        $contract->place_id    = $request->place_id;
        $contract->trader_id   = $request->trader_id;
        $contract->status      = true;
        $contract->rate        = $place->price;
        $contract->author      = Auth::user()->name;
        $contract->ending_date = $request->ending_date;
        $contract->save();

    }


    public function show($id)
    {
        $contract = Contract::findOrFail($id);
        return $contract;
    }

    public function edit($id)
    {
        //
    }

    public function update(Req $request, $id)
    {
        Contract::findOrFail($id)->update($request::all());
        return Response::json($request::all());

    }

    public function destroy($id)
    {
        return Contract::destroy($id);
    }


    //Metodos de auxilio
    public function getPlaceForContract()
    {
        $place = Place::where('typeofplace_id','<', 7)->where(function ($query) {$query->whereDoesntHave('traders');})->get();
        return $place;
    }
    public function getTraderForContract()
    {
        $trader = Trader::whereDoesntHave('places')->get();
        return $trader;
    }


    public function statusControlsChange(Request $request)
    {
        $id  = $request->id;
        $contract = Contract::find($id);
        if ($contract->status == true) {
            $contract->status = false;
        }else {
            $contract->status = true;
        }
        $contract->save();
        return response($contract, 200);
    }


}
