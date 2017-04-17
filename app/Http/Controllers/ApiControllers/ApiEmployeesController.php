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
use Validator;
use Carbon\Carbon;

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

        public function store(EmployeesRequest $request)
        {
            $username = 'Funcionario'.$request->ic;
            $password = 'SAGMMA'.$request->ic;
            $name     = ucwords($request->name);
            if ($request->service_beginning == '') {
                $service_beginning = Carbon::now();
            }else {
                $service_beginning = $request->service_beginning;
            }

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
            $employee->service_beginning = $service_beginning;
            $employee->typeofemployee_id = $request->typeofemployee_id;
            $employee->photo             = $request->photo;
            $employee->description       = $request->description;
            $employee->save();
            $employee->markets()->sync($request->markets);

            if ($request->get_acount) {
                // $validation = Validator::make(Input::all(),
                // [
                //     'name' => 'min:4|max:45|required|string|unique:users',
                // ]);
                // if($validation->fails()) {
                //     return Response::json(['status'=>'error', 'message'=>$validation->messages()]);
                // } else {
                $user                  = new User();
                $user->name            = $name;
                $user->username        = $username;
                $user->ic              = $request->ic;
                $user->email           = $request->email;
                $user->password        = bcrypt($password);
                $user->gender          = $request->gender;
                $user->age             = $request->age;
                $user->state           = $request->state;
                $user->council         = $request->council;
                $user->parish          = $request->parish;
                $user->zone            = $request->zone;
                $user->phone           = $request->phone;
                $user->avatar          = 'default.png';
                $user->status          = false;
                $user->type            = 'emp';
                $user->description     = $request->description;
                $user->save();
            }
        }

        public function show($id)
        {
            $employee = Employee::findOrFail($id);
            $employee->markets;
            return $employee;
        }

        public function edit($id)
        {
            //
        }

        public function update(EmployeesRequest $request, $id)
        {
            $service_beginning = $request->service_beginning;
            if ($request->service_beginning == '') {
                $service_beginning = Carbon::now();
            }else {
                $service_beginning = $request->service_beginning;
            }
            $name              = ucwords($request->name);
            $ic                = $request->ic;
            $age               = $request->age;
            $gender            = $request->gender;
            $email             = $request->email;
            $state             = $request->state;
            $council           = $request->council;
            $parish            = $request->parish;
            $zone              = $request->zone;
            $phone             = $request->phone;
            $echelon           = $request->echelon;
            $typeofemployee_id = $request->typeofemployee_id;
            $description       = $request->description;

            $employee = Employee::findOrFail($id);
            $employee->name        = $name;
            $employee->ic          = $ic;
            $employee->age         = $age;
            $employee->gender      = $gender;
            $employee->email       = $email;
            $employee->state       = $state;
            $employee->council     = $council;
            $employee->parish      = $parish;
            $employee->zone        = $zone;
            $employee->phone       = $phone;
            $employee->service_beginning = $service_beginning;
            $employee->typeofemployee_id = $typeofemployee_id;
            $employee->description = $description;
            $employee->save();
            $employee->markets()->sync($request->markets);

            $user = User::where('ic', '=', $ic);
            if ($user) {
                $user->update(array(
                    'name'        => $name,
                    'ic'          => $ic,
                    'email'       => $email,
                    'gender'      => $gender,
                    'age'         => $age,
                    'state'       => $state,
                    'council'     => $council,
                    'parish'      => $parish,
                    'zone'        => $zone,
                    'phone'       => $phone,
                    'description' => $description,
                ));
            }
        }



        public function destroy($id)
        {
            return Employee::destroy($id);
        }

        public function deleteAll($ids)
        {
            // Employee::find(explode(',', $ids))->delete();
            return Employee::whereIn('id', $ids)->delete();
            // return Employee::destroy($ids);

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
