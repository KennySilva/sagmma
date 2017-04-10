<?php

namespace Sagmma\Http\Controllers;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use User;
use Role;
use Permission;
use Carbon\Carbon;

class BackendHomeController extends Controller
{

    public function __construct()
    {
        Carbon::setlocale('pt');
    }

    public function index()
    {


        // ----------------------------------------get---------------------------------------------
        $admins = User::orderBy('name', 'asc')->where(function ($query) {$query->whereHas('roles', function($q){
            $q->where('name', '=', 'Admin');
        });})->get();

        $superAdmins = User::orderBy('name', 'asc')->where(function ($query) {$query->whereHas('roles', function($q){
            $q->where('name', '=', 'super-admin');
        });})->get();

        $actives = User::orderBy('name', 'asc')->where('status', 1)->get();

        $users = User::orderBy('name', 'asc')->get();
        // --------------------------------------return--------------------------------------------

        return view('_backend.home', compact('admins', 'superAdmins', 'actives', 'users'));
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
