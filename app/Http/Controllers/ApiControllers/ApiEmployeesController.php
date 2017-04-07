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
            $username          = ucwords($request->username);

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
                $user->name            = $name;
                $user->username        = $username;
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
                $user->type            = 'emp';
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

        public function update(EmployeesRequest $request, $id)
        {
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
            $service_beginning = $request->service_beginning;
            $typeofemployee_id = $request->typeofemployee_id;
            $description       = $request->description;

            $employee = Employee::where('id', '=', $id);
            $employee->update([
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
                'service_beginning' => $service_beginning,
                'typeofemployee_id' => $typeofemployee_id,
                'description'       => $description,
            ]);
            $employee->markets()->sync($request->markets);

            $user = User::where('ic', '=', $ic);
            if ($user) {
                $user->update(array(
                    'name'        => $name,
                    // 'username'    => $username,
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
