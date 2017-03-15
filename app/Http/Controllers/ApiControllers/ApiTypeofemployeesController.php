<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\SagmmaRequests\TypeofemployeesRequest;
use Typeofemployee;
use Response;
use Input;

class ApiTypeofemployeesController extends Controller
{
    public function index($row)
    {
        return Typeofemployee::paginate($row);
    }

    public function create()
    {}

        public function store(TypeofemployeesRequest $request)
        {
            $typeofemployee              = new Typeofemployee($request->all());
            $typeofemployee->name        = $request->name;
            $typeofemployee->description = $request->description;
            $typeofemployee->save();
        }


        public function show($id)
        {
            $typeofemployee = Typeofemployee::findOrFail($id);
            return $typeofemployee;
        }

        public function edit($id)
        {
            //
        }

        public function update(Req $request, $id)
        {
            Typeofemployee::findOrFail($id)->update($request::all());
            return Response::json($request::all());

        }

        public function destroy($id)
        {
            return Typeofemployee::destroy($id);
        }
    }
