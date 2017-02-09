<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\SagmmaRequests\PlacesRequest;
use Place;
use Typeofplace;
use Response;
use Input;

class ApiPlacesController extends Controller
{
    public function index()
    {
        $place = Place::paginate(5);
        $place->each(function($place){
            $place->typeofplace;
        });
        return $place;
    }

    public function create()
    {}

        public function store(PlacesRequest $request)
        {
            $place                 = new Place($request->all());
            $place->name           = $request->name;
            $place->dimension      = $request->dimension;
            $place->price          = $request->price;
            $place->description    = $request->description;
            $place->status         = $request->status;
            $place->typeofplace_id = $request->typeofplace_id;
            $place->save();
        }


        public function show($id)
        {
            $place = Place::findOrFail($id);
            return $place;
        }

        public function edit($id)
        {
            //
        }

        public function update(Req $request, $id)
        {
            Place::findOrFail($id)->update($request::all());
            return Response::json($request::all());

        }

        public function destroy($id)
        {
            return Place::destroy($id);
        }

        public function getTypeForPlace()
        {
            $typeofplace = Typeofplace::all();
            return $typeofplace;
        }

        public function placeStatus(Request $request)
        {
            $id  = $request->id;
            $place = Place::find($id);
            if ($place->status == true) {
                $place->status = false;
            }else {
                $place->status = true;
            }
            $place->save();
            return response($place, 200);
        }

    }
