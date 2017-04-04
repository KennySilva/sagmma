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
use Auth;

class ApiPermissionsController extends Controller
{
    public function index($row)
    {
        foreach (Auth::user()->roles as $role) {
            # code...
            if ($role->name == 'super-admin') {
                $permissions = Permission::paginate($row);
            }else{
                $permissions = Permission::where('name', '!=', 'admin')->where('name', '!=', 'manage-admins')->paginate($row);
            }
        }
        return $permissions;




        // return Permission::paginate($row);
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

    public function update(PermissionsRequest $request, $id)
    {
        $permission = Permission::find($id);
        $permission->fill($request->all());
        $permission->save();

    }

    public function destroy($id)
    {
        return Permission::destroy($id);
    }
}
