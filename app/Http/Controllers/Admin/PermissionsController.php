<?php

namespace Sagmma\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;

class PermissionsController extends Controller
{
    public function index()
    {
        return view('_backend.permissions.show');
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
