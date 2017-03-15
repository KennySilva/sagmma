<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\SagmmaRequests\ControlsRequest;
use Control;
use Employee;
use Material;
use Response;
use Input;

class ApiControlsController extends Controller
{
    public function index($row)
    {
        $control = Control::paginate($row);
        $control->each(function($control){
            $control->employees;
            $control->materials;
        });
        return $control;
    }

    public function create()
    {

    }

    public function store(ControlsRequest $request)
    {
        $control              = new Control($request->all());
        $control->employee_id = $request->employee_id;
        $control->material_id = $request->material_id;
        $control->status = $request->status;
        $control->author = \Auth::user()->name;
        $control->save();

    }


    public function show($id)
    {
        $control = Control::findOrFail($id);
        return $control;
    }

    public function edit($id)
    {
        //
    }

    public function update(Req $request, $id)
    {
        Control::findOrFail($id)->update($request::all());
        return Response::json($request::all());

    }

    public function destroy($id)
    {
        return Control::destroy($id);
    }


    //Metodos de auxilio
    public function getEmployeeForControl()
    {
        $employee = Employee::all();
        return $employee;
    }

    public function getMaterialForControl()
    {
        $material = Material::all();
        return $material;
    }

    public function statusControlsChange(Request $request)
    {
        $id  = $request->id;
        $control = Control::find($id);
        if ($control->status == true) {
            $control->status = false;
        }else {
            $control->status = true;
        }
        $control->save();
        return response($control, 200);
    }


}
