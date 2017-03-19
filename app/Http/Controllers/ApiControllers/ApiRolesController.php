<?php

namespace Sagmma\Http\Controllers\ApiControllers;
use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\RolesRequest;
use Role;
use Permission;
use Response;
use Input;
use Auth;


class ApiRolesController extends Controller
{
    public function index($row)
    {
        $role = Role::paginate($row);
        $role->each(function($role){
            $role->perms;
        });
        return $role;
    }

    public function create()
    {}

        public function store(RolesRequest $request)
        {
            $role               = new Role($request->all());
            $role->name         = $request->name;
            $role->display_name = $request->display_name;
            $role->description  = $request->description;
            $role->save();

            $role->perms()->sync($request->permissions);
        }


        public function show($id)
        {
            $role = Role::findOrFail($id);
            $role->perms;
            return $role;
        }

        public function edit($id)
        {
            //
        }

        public function update(Request $request, $id)
        {
            $role = Role::find($id);
            $role->fill($request->all());
            $role->save();
            $role->perms()->sync($request->permissions);
            //     $role = Role::findOrFail($id)->update($request::all());
            // return Response::json($request::all());

        }

        public function destroy($id)
        {
            return Role::destroy($id);
        }

        // Outros Metodos
        public function getPermissionForRole()
        {
            foreach (Auth::user()->roles as $role) {
                # code...
                if ($role->name == 'super-admin') {
                    $permissions = Permission::all();
                }else{
                    $permissions= Permission::where('name', '!=', 'admin')->get();
                }
            }
            return $permissions;
        }
    }
