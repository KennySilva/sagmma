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
    // public function __construct()
    // {
    //     $this->placeStatusChange();
    // }
    //

    public function index($row)
    {
        $this->placeStatusChange();

        $place = Place::paginate($row);
        $place->each(function($place){
            $place->contract;
            $place->typeofplace;
            $place->taxation;

        });


        return $place;
    }

    public function create()
    {}

        public function store(PlacesRequest $request)
        {
            if ($request->typeofplace_id == 1) {
                $price    = 0;
                $dimension= 0;
            }else {
                $price    = $request->price;
                $dimension= $request->dimension;
            }
            $name= ucwords($request->name);
            $place                 = new Place($request->all());
            $place->name           = $name;
            $place->description    = $request->description;
            $place->status         = $request->status;
            $place->price          = $price;
            $place->dimension      = $dimension;
            $place->typeofplace_id = $request->typeofplace_id;
            $place->save();
        }


        public function show($id)
        {
            $place = Place::findOrFail($id);
            $place->traders;
            $place->typeofplace;
            return $place;
        }

        public function edit($id)
        {
            //
        }

        public function update(PlacesRequest $request, $id)
        {
            $name           = $request->name;
            $typeofplace_id = $request->typeofplace_id;
            $price          = $request->price;
            $dimension      = $request->dimension;
            $description    = $request->description;

            $place = new Place();
            $place->where('id', $id)->update(array(
                'name'    => $name,
                'typeofplace_id'   => $typeofplace_id,
                'price' => $price,
                'dimension' => $dimension,
                'description' => $description
            ));
        }

        public function destroy($id)
        {
            return Place::destroy($id);
        }

        public function deleteAll($ids)
        {
            Place::destroy(explode(',', $ids));
        }

        public function getTypeForPlace()
        {
            $typeofplace = Typeofplace::all();
            return $typeofplace;
        }

        public function placeStatusChange()
        {
            $places = Place::all();
            $places->each(function($places){
                $places->contract;
            });

            foreach ($places as $place) {
                if ($place->contract == null) {
                    $place->status = 0;
                }else {
                    $place->status = 1;
                }
                $place->save();
            }



            // $places = Place::has('traders')->get();
            // foreach ($places as $place) {
            //     $place->status = 1;
            //     $place->save();
            // }
            //
            // $places2 = Place::whereDoesntHave('traders')->get();
            // foreach ($places2 as $place2) {
            //     $place2->status = 0;
            //     $place2->save();
            // }
        }
    }
