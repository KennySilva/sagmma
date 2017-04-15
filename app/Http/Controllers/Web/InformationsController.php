<?php

namespace Sagmma\Http\Controllers\Web;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Article;


class InformationsController extends Controller
{
    public function index()
    {
        return view('_frontend.web.showInformations.informations');
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
