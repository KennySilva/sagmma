<?php

namespace Sagmma\Http\Controllers;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;


class FrontController extends Controller
{


    public function index()
    {
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
