<?php

namespace Sagmma\Http\Controllers\Web;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Place;
use Trader;


class InformationsController extends Controller
{
    public function index()
    {
        $places = Place::orderBy('name', 'desc')->where('status', false)->paginate(10);
        $lastPlaces = Place::orderBy('updated_at', 'desc')->where('status', false)->take(5)->get();
        $traders = Trader::orderBy('name', 'desc')->get();
        return view('_frontend.web.showInformations.informations', ['places' => $places, 'traders' => $traders, 'lastPlaces' => $lastPlaces]);
    }

    public function create()
    {
        
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
