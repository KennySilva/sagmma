<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\SagmmaRequests\EmployeesRequest;
use Employee;
use Typeofemployee;
use Market;
use Response;
use Input;

class ApiEmployeesController extends Controller
{
    public function index(Request $request)
    {
        $employee = Employee::paginate(5);
        $employee->each(function($employee){
            $employee->market;
            $employee->typeofemployees;
        });
        return $employee;
    }

    public function create()
    {}
        
        public function store(EmployeesRequest $request)
        {
            $employee                    = new Employee($request->all());
            $employee->name              = $request->name;
            $employee->ic                = $request->ic;
            $employee->age               = $request->age;
            $employee->gender            = $request->gender;
            $employee->email             = $request->email;
            $employee->state             = $request->state;
            $employee->council           = $request->council;
            $employee->parish            = $request->parish;
            $employee->zone              = $request->zone;
            $employee->phone             = $request->phone;
            $employee->echelon           = $request->echelon;
            $employee->service_beginning = $request->service_beginning;
            $employee->market_id         = $request->market_id;
            $employee->typeofemployee_id = $request->typeofemployee_id;
            $employee->photo             = $request->photo;
            $employee->description       = $request->description;
            $employee->save();
        }


        public function show($id)
        {
            $employee = Employee::findOrFail($id);
            return $employee;
        }

        public function edit($id)
        {
            //
        }

        public function update(Req $request, $id)
        {
            Employee::findOrFail($id)->update($request::all());
            return Response::json($request::all());
        }

        public function destroy($id)
        {
            return Employee::destroy($id);
        }

        public function getMarketforEmployee()
        {
            $market = Market::all();
            return $market;
            // return Response::json($market);

            // $market = Market::all(['id','name']);
            // return $market->map(function ($market) {
            //     return [
            //         'text'              => $market->name,
            //         'value'             => $market->id,
            //     ];
            // })->toArray();

        }

        public function getTypeForEmployee()
        {
            $typeofemployee = Typeofemployee::all();
            return $typeofemployee;
        }
    }
