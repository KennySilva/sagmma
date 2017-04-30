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
use Carbon\Carbon;


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
        $contract            = new Contract();
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
        $contract->places;
        $contract->traders;
        return $contract;
    }

    public function edit($id)
    {
        //
    }

    public function update(ContractsRequest $request, $id)
    {
        $place_id    = $request->place_id;
        $trader_id   = $request->trader_id;
        $ending_date = $request->ending_date;

        $contract = new Contract();
        $contract->where('id', $id)->update(array(
            'place_id'    => $place_id,
            'trader_id'   => $trader_id,
            'ending_date' => $ending_date
        ));
    }

    public function destroy($id)
    {
        return Contract::destroy($id);
    }

    //Metodos de auxilio
    public function getPlaceForContract()
    {
        /*
        A lógica de criação de contrato, pois, sabe-se que um espaço que já possui um comerciante
        não pode ser atribuido ao outro comerciante e um comerciante com um espaço não pode ob_deflatehandlerum outro espaço, por isso a lógica que se egue representa perfeitamente esta realidade
        */
        $place = Place::whereDoesntHave('traders')->whereHas('typeofplace', function ($type)
        {
            $type->orderBy('name', 'asc')->where('name', '!=', 'Outros');
        })->get();
        return $place;
    }
    public function getTraderForContract()
    {
        $trader = Trader::orderBy('name', 'asc')->whereDoesntHave('places')->get();
        return $trader;
    }

    public function statusContractsChange()
    {
        $now = Carbon::now();
        $contracts = Contract::all();
        foreach ($contracts as $contract) {
            if ($contract->ending_date <= $now ) {
                $contract->status = 0;
            }else {
                $contract->status = 1;
            }
            $contract->save();
        }
    }
}
