<?php

namespace Sagmma\Http\Controllers\Sagmma;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Control;


class ControlsController extends Controller
{
    public function index()
    {
        return view('_backend.controls.show');

    }
    
    public function create()
    {
        return view('_backend.controls.create');
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
