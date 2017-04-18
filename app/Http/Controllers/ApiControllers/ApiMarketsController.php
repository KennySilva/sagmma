<?php

namespace Sagmma\Http\Controllers\ApiControllers;
use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\SagmmaRequests\MarketsRequest;
use Market;
use Response;
use Input;

class ApiMarketsController extends Controller
{
    public function index($row)
    {
        $markets = Market::paginate($row);
        $markets->each(function($markets){
            $markets->employees;
        });
        return $markets;
    }

    public function create()
    {}

    public function store(MarketsRequest $request)
    {
        $market              = new Market($request->all());
        $market->name        = $request->name;
        $market->location    = $request->location;
        $market->description = $request->description;
        $market->logo        = $request->logo;
        $market->save();
    }


    public function show($id)
    {
        $market = Market::findOrFail($id);
        return $market;
    }

    public function edit($id)
    {
        //
    }

    public function update(MarketsRequest $request, $id)
    {

        $market              = Market::findOrFail($id);
        $market->name        = $request->name;
        $market->location    = $request->location;
        $market->description = $request->description;
        $market->save();
    }

    public function destroy($id)
    {
        return Market::destroy($id);
    }
}
