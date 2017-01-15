<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\SagmmaRequests\TaxationsRequest;
use Taxation;
use Employee;
use Place;
use Response;
use Input;
use Auth;

class ApiTaxationsController extends Controller
{
    public function index()
    {
        $taxation = Taxation::paginate(5);

        $taxation->each(function($taxation){
            $taxation->employees;
            $taxation->places;
        });
        return $taxation;

    }

    public function create()
    {

    }

    public function store(TaxationsRequest $request)
    {
        $taxation            = new Taxation($request->all());
        $taxation->employee_id  = $request->employee_id;
        $taxation->place_id = $request->place_id;
        $taxation->income = $request->income;
        $taxation->type = $request->type;
        $taxation->author    = Auth::user()->name;
        $taxation->save();

    }

    public function show($id)
    {
        $taxation = Taxation::findOrFail($id);
        return $taxation;
    }

    public function edit($id)
    {
        //
    }

    public function update(Req $request, $id)
    {
        Taxation::findOrFail($id)->update($request::all());
        return Response::json($request::all());

    }

    public function destroy($id)
    {
        return Taxation::destroy($id);
    }

    //Metodos de auxilio
    public function getEmployeeForTaxation()
    {
        $employee = Employee::all();
        return $employee;
    }
    public function getPlaceForTaxation()
    {
        $place = Place::all();
        return $place;
    }

}
