<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\SagmmaRequests\MaterialsRequest;
use Material;
use Response;
use Input;

class ApiMaterialsController extends Controller
{
    public function index()
    {
        return Material::paginate(5);
    }

    public function create()
    {}

        public function store(MaterialsRequest $request)
        {
            $material              = new Material($request->all());
            $material->name        = $request->name;
            $material->description = $request->description;
            $material->save();
        }


        public function show($id)
        {
            $material = Material::findOrFail($id);
            return $material;
        }

        public function edit($id)
        {
            //
        }

        public function update(Req $request, $id)
        {
            Material::findOrFail($id)->update($request::all());
            return Response::json($request::all());

        }

        public function destroy($id)
        {
            return Material::destroy($id);
        }
    }
