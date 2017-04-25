<?php

namespace Sagmma\Http\Controllers;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Mapper;

class FrontController extends Controller
{


    public function index()
    {
        Mapper::map(15.09344027, -23.66661474, ['title' => 'Mercado Novo de Achada Riba',
        'eventDomReady' => 'console.log(1);']);
        Mapper::marker(15.09670065, -23.66797999, ['title' => 'Pilourinho, Mercado Central',
        'eventDomReady' => 'console.log(1);']);
        Mapper::marker(15.09323827, -23.67163584, ['title' => 'Piso, Mercado de Animal',
        'eventDomReady' => 'console.log(1);']);
        return view('_frontend.frontend');
    }

    public function create()
    {
        //
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

    public function myProfile($value='')
    {
        return view('_frontend.web.profile.frontProfile');

    }
}
