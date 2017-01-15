<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\SagmmaRequests\TypeofplacesRequest;
use Typeofplace;
use Response;
use Input;

class ApiTypeofplacesController extends Controller
{
    public function index()
    {
        return Typeofplace::paginate(5);
    }

    public function create()
    {}

        public function store(TypeofplacesRequest $request)
        {
            $typeofplace              = new Typeofplace($request->all());
            $typeofplace->name        = $request->name;
            $typeofplace->description = $request->description;
            $typeofplace->save();
        }


        public function show($id)
        {
            $typeofplace = Typeofplace::findOrFail($id);
            return $typeofplace;
        }

        public function edit($id)
        {
            //
        }
        
        public function update(Req $request, $id)
        {
            Typeofplace::findOrFail($id)->update($request::all());
            return Response::json($request::all());

        }

        public function destroy($id)
        {
            return Typeofplace::destroy($id);
        }
    }
