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
        // $role = Role::paginate($row);
        // $role->each(function($role){
        //     $role->perms;
        // });
        // return $role;

        foreach (Auth::user()->roles as $role) {
            # code...
            if ($role->name == 'super-admin') {
                $roles = Role::paginate($row);
                $roles->each(function($roles){
                    $roles->perms;
                });
            }else{
                $roles = Role::where('name', '!=', 'admin')->where('name', '!=', 'super-admin')->paginate($row);
                $roles->each(function($roles){
                    $roles->perms;
                });
            }
        }
        return $roles;

    }

    public function create()
    {}

        public function store(RolesRequest $request)
        {
            $display_name = ucwords($request->display_name);

            $role               = new Role($request->all());
            $role->name         = $request->name;
            $role->display_name = $display_name;
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

        // public function superAdminPermissions()
        // {
        //     $permissions = Permission::all();
        //     // $permissions->all();
        //     $role = Role::where('name', 'trader')->get();
        //     // return $role;
        //     foreach ($permissions as $permission) {
        //         // return $role->attachPermissions('1');
        //         // $role->perms()->sync(1);
        //         dd($permissions);
        //     }
        // }


        public function update(RolesRequest $request, $id)
        {
            $role = Role::find($id);
            $role->fill($request->all());
            $role->save();
            $role->perms()->sync($request->permissions);
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
                    $permissions = Permission::orderBy('display_name', 'asc')->get();
                }else{
                    $permissions= Permission::orderBy('display_name', 'asc')->where('name', '!=', 'admin')->where('name', '!=', 'manage-admins')->get();
                }
            }
            return $permissions;
        }
    }
