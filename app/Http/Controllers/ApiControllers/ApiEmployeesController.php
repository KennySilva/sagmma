<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\SagmmaRequests\EmployeesRequest;
use Sagmma\Http\Requests\UsersRequest;
use Employee;
use Market;
use User;
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
            $employee->controls;
            $employee->taxation;
        });
        return $employee;
    }

    public function create()
    {}

        public function store(EmployeesRequest $request, UsersRequest $urequest)
        {
            $name = ucwords($request->name);
            $employee                    = new Employee();
            $employee->name              = $name;
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

            if ($urequest->password != '') {
                $user                  = new User();
                $user->name            = $urequest->name;
                $user->username        = $urequest->username;
                $user->ic              = $urequest->ic;
                $user->email           = $urequest->email;
                $user->password        = bcrypt($urequest->get_password);
                $user->gender          = $urequest->gender;
                $user->age             = $urequest->age;
                $user->state           = $urequest->state;
                $user->council         = $urequest->council;
                $user->parish          = $urequest->parish;
                $user->zone            = $urequest->zone;
                $user->phone           = $urequest->phone;
                $user->avatar          = 'default.png';
                $user->status          = false;
                $user->type            = 'trad';
                $user->description     = $urequest->description;
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
