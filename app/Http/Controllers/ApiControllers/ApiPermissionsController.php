<?php

namespace Sagmma\Http\Controllers\ApiControllers;
use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\PermissionsRequest;
use Permission;
use Response;
use Input;

class ApiPermissionsController extends Controller
{
    public function index()
    {
        return Permission::paginate(5);
    }

    public function create()
    {}

    public function store(PermissionsRequest $request)
    {
        $permission               = new Permission($request->all());
        $permission->name         = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description  = $request->description;
        $permission->save();
    }


    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return $permission;
    }

    public function edit($id)
    {
        //
    }

    public function update(Req $request, $id)
    {
        Permission::findOrFail($id)->update($request::all());
        return Response::json($request::all());

    }

    public function destroy($id)
    {
        return Permission::destroy($id);
    }
}
