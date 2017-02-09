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
    public function index()
    {
        $trader = Trader::paginate(5);
        return $trader;
    }

    public function create()
    {}

        public function store(TradersRequest $request)
        {
            $trader                  = new Trader();
            $trader->name            = $request->name;
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

            if ($request->get_password != '') {
                $user                  = new User();
                $user->name            = $request->name;
                $user->username        = 'comerciant4';
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
            $trader = Trader::findOrFail($id);
            return $trader;
        }

        public function edit($id)
        {
            //
        }

        public function update(Req $request, $id)
        {
            Trader::findOrFail($id)->update($request::all());
            return Response::json($request::all());

        }

        public function destroy($id)
        {
            return Trader::destroy($id);
        }


    }
