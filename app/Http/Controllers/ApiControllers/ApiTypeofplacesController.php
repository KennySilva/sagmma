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
use Validator;
use Illuminate\Validation\Rule;

class ApiTypeofplacesController extends Controller
{
    public function index($row)
    {
        return Typeofplace::paginate($row);
    }

    public function create()
    {}

        public function store(TypeofplacesRequest $request)
        {
            // -----------------------------------------------------------------------------
            $typeofplace              = new Typeofplace($request->all());
            $typeofplace->name        = $request->name;
            $typeofplace->description = $request->description;
            $typeofplace->save();
            // -----------------------------------------------------------------------------
            if($typeofplace)
            {
                return Response::json(['status'=>'success', 'message'=>'Save successful'], 200);
            }
            return Response::json(['status'=>'error', 'message'=>$request->messages()]);
            // -----------------------------------------------------------------------------

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

        public function update(TypeofplacesRequest $request, $id)
        {


            // -----------------------------------------------------------------------------
            $validation = Validator::make(Input::all(),
            [
                'name' => 'min:4|max:45|required|string|unique:typeofplaces,name,'.$id,
                // 'name' =>  ['required', 'max:54', 'min:4', 'unique:typeofplaces,name,'.$id, 'Regex:^\(\d{3}\)-\d{4}-\d{4}$'],
                // 'name' =>  ['required', 'max:54', 'min:4', 'unique:typeofplaces,name,'.$id, 'Regex: /^\d{4}-\d{4}$/'], keli sta certo

                'description' => 'min:4|max:250|string'
            ]);
            // -----------------------------------------------------------------------------
            if($validation->fails()) {
                return Response::json(['status'=>'error', 'message'=>$validation->messages()]);
            } else {
                $id          = Input::get('id');
                $name        = Input::get('name');
                $description = Input::get('description');
                // ---------------------------------------------------------
                $typeofplace = new Typeofplace();
                // ---------------------------------------------------------
                $typeofplace->where('id', $id)->update(array(
                    'name'              => $name,
                    'description'       => $description
                ));
                // ---------------------------------------------------------------------------
                return Response::json(['status'=>'success', 'message'=>'Save successful'], 200);
                // ---------------------------------------------------------------------------
            }
            // -----------------------------------------------------------------------------
        }

        public function destroy($id)
        {
            return Typeofplace::destroy($id);
        }
    }
