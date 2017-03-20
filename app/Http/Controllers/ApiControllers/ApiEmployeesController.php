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
    public function index($row)
    {
        $employee = Employee::paginate($row);
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

            $name              = Input::get('name');
            $ic                = Input::get('ic');
            $age               = Input::get('age');
            $gender            = Input::get('gender');
            $email             = Input::get('email');
            $state             = Input::get('state');
            $council           = Input::get('council');
            $parish            = Input::get('parish');
            $zone              = Input::get('zone');
            $phone             = Input::get('phone');
            $echelon           = Input::get('echelon');
            $service_beginning = Input::get('service_beginning');
            $typeofemployee_id = Input::get('typeofemployee_id');
            $photo             = Input::get('photo');
            $description       = Input::get('description');

            // $name              = $request->name;
            // $ic                = $request->ic;
            // $age               = $request->age;
            // $gender            = $request->gender;
            // $email             = $request->email;
            // $state             = $request->state;
            // $council           = $request->council;
            // $parish            = $request->parish;
            // $zone              = $request->zone;
            // $phone             = $request->phone;
            // $echelon           = $request->echelon;
            // $service_beginning = $request->service_beginning;
            // $typeofemployee_id = $request->typeofemployee_id;
            // $photo             = $request->photo;
            // $description       = $request->description;

            $employee = new Employee();
            $employee->where('id', $id)->update(array(
                'name'              => $name,
                'ic'                => $ic,
                'age'               => $age,
                'gender'            => $gender,
                'email'             => $email,
                'state'             => $state,
                'council'           => $council,
                'parish'            => $parish,
                'zone'              => $zone,
                'phone'             => $phone,
                'echelon'           => $echelon,
                'service_beginning' => $service_beginning,
                'typeofemployee_id' => $typeofemployee_id,
                'photo'             => $photo,
                'description'       => $description
            ));
            // $employee->markets()->sync($request->markets);

            // $employee->markets()->sync($markets);

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
