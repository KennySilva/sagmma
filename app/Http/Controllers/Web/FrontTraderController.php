<?php

namespace Sagmma\Http\Controllers\Web;
use Illuminate\Http\Request;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Trader;

class FrontTraderController extends Controller
{
    public function index()
    {
        // return Trader::all();
        return view('_frontend.web.index');
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
}