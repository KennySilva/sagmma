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
        $typeofemployee = Typeofemployee::paginate($row);
        $typeofemployee->each(function($typeofemployee){
            $typeofemployee->employees;
        });
        return $typeofemployee;
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

        public function update(TypeofemployeesRequest $request, $id)
        {
            $typeofemployee = Typeofemployee::find($id);
            $typeofemployee->fill($request->all());
            $typeofemployee->save();
        }

        public function destroy($id)
        {
            return Typeofemployee::destroy($id);
        }
    }
