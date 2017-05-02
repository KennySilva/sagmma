<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\SagmmaRequests\TradersRequest;
use Sagmma\Http\Requests\UsersRequest;
use Trader;
use Response;
use Input;
use User;

class ApiTradersController extends Controller
{
    public function index($row)
    {
        $trader = Trader::paginate($row);
        $trader->each(function($trader){
            $trader->contract;
            $trader->promotion;
        });
        return $trader;
    }

    public function create()
    {}

        public function store(TradersRequest $request)
        {
            $username = 'Comerciante'.$request->ic;
            $password = 'SAGMMA'.$request->ic;
            $name     = ucwords($request->name);
            $trader                  = new Trader();
            $trader->name            = $name;
            $trader->ic              = $request->ic;
            $trader->age             = $request->age;
            $trader->gender          = $request->gender;
            $trader->email           = $request->email;
            $trader->state           = $request->state;
            $trader->council         = $request->council;
            $trader->parish          = $request->parish;
            $trader->zone            = $request->zone;
            $trader->phone           = $request->phone;
            $trader->photo           = $request->photo;
            $trader->description     = $request->description;
            $trader->save();

            if ($request->get_acount) {
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
                $user->type            = 'trad';
                $user->description     = $request->description;
                $user->save();
            }
        }


        public function show($id)
        {
            $trader = Trader::findOrFail($id);
            return $trader;
        }

        public function edit($id)
        {
            //
        }

        public function update(TradersRequest $request, $id)
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
            $description       = $request->description;

            $trader = Trader::findOrFail($id);
            $trader->name        = $name;
            $trader->ic          = $ic;
            $trader->age         = $age;
            $trader->gender      = $gender;
            $trader->email       = $email;
            $trader->state       = $state;
            $trader->council     = $council;
            $trader->parish      = $parish;
            $trader->zone        = $zone;
            $trader->phone       = $phone;
            $trader->description = $description;
            $trader->save();

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
            $trader =  Trader::where('id', '=', $id)->first();
            $user = User::where('ic', '=', $trader->ic)->first();
            $trader->delete();
            if ($user) {
                $user->delete();
            }
        }

        public function deleteAll($ids)
        {
            Trader::destroy(explode(',', $ids));
        }
    }
