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
    public function index($row)
    {
        $taxation = Taxation::paginate($row);

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
        $taxation= new Taxation();
        if ( $request->place_id == '') {
            $place_id = 1;
        }else {
            $place_id = $request->place_id;
        }
        $place = Place::where('id', '=', $place_id)->first();
        if ($request->type == 1) {
            $taxation->employee_id = Auth::user()->id;
            $taxation->income      = $place->price;
            $taxation->place_id    = $request->place_id;
        }else {
            $taxation->employee_id = $request->employee_id;
            $taxation->income      = $request->income;
            $taxation->place_id    =  $request->place_id;
        }
        $taxation->type        = $request->type;
        $taxation->author      = Auth::user()->name;
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
        $id = Auth::user()->id;
        $employee = Employee::where('id', '!=', $id)->get();
        return $employee;
    }

    // --------------------------------------------------------------------------------------
    public function getPlaceExtForTaxation()
    {
        $place = Place::where('typeofplace_id', '>=', 4)->get();
        // $place = Place::where('typeofplace_id', '>3', 7)->orWhere('typeofplace_id', '=', 6)->orWhere('typeofplace_id', '=', 5)->orWhere('typeofplace_id', '=', 4)->get();
        return $place;
    }


    public function getPlaceIntForTaxation()
    {
        $place = Place::where('typeofplace_id', '<', 4)->get();
        return $place;
    }

}
