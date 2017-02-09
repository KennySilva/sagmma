<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\SagmmaRequests\EmployeesRequest;
use Employee;
use Market;
use Typeofemployee;
use Response;
use Input;

class ApiEmployeesController extends Controller
{
    public function index(Request $request)
    {
        $employee = Employee::paginate(5);
        $employee->each(function($employee){
            $employee->typeofemployees;
            $employee->markets;
        });
        return $employee;
    }

    public function create()
    {}

        public function store(EmployeesRequest $request)
        {
            $employee                    = new Employee();
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
            $employee->typeofemployee_id = $request->typeofemployee_id;
            $employee->photo             = $request->photo;
            $employee->description       = $request->description;
            $employee->save();
            $employee->markets()->sync($request->markets);

            if ($request->get_password != '') {
                $user                  = new User();
                $user->name            = $request->name;
                $user->username        = "Funcionário3".$request->id;
                $user->ic              = $request->ic;
                $user->email           = $request->email;
                $user->password        = bcrypt($request->get_password);
                $user->gender          = $request->gender;
                $user->age             = $request->age;
                $user->state           = $request->state;
                $user->council         = $request->council;
                $user->parish          = $request->parish;
                $user->zone            = $request->zone;
                $user->phone           = $request->phone;
                $user->avatar          = 'default.png';
                $user->status          = false;
                $user->type            = 'trad';
                $user->description     = $request->description;
                $user->save();
            }
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
            $markets = Market::all();
            return $markets;

        }

        public function getTypeForEmployee()
        {
            $typeofemployee = Typeofemployee::all();
            return $typeofemployee;
        }
    }
