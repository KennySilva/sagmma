<?php

namespace Sagmma\Http\Controllers\ApiControllers;
use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\UsersRequest;
use User;
use Role;
use Trader;
use Employee;
use Response;
use Input;
use Auth;

class ApiUsersController extends Controller
{
    public function index($row)
    {
        $user = User::paginate($row);
        $user->each(function($user){
            $user->roles;
        });
        return $user;
        // foreach (Auth::user()->roles as $role) {
        //     if ($role->name == 'super-admin') {
        //         $user = User::paginate($row);
        //         $user->each(function($user){
        //             $user->roles;
        //         });
        //         return $user;
        //     }else{
        //         // $thisUserRole = $role->where('name', 'admin')->where('name', 'super-admin')
        //
        //         $user = User::paginate($row);
        //         $user->each(function($user){
        //             // $user->roles;
        //             $user->roles->where('name', '!=', 'admin');
        //         });
        //         return $user;
        //         // $roles= Role::where('name', '!=', 'admin')->where('name', '!=', 'super-admin')->get();
        //     }
        // }
    }

    public function create()
    {
        // // return User::create($request->all());
        // $user = new User($request->all());
        // $user->password = bcrypt($request->password);
        // $user->save();
    }

    public function store(UsersRequest $request)
    {
        $user              = new User();
        $user->name        = $request->name;
        $user->username    = $request->username;
        $user->ic          = $request->ic;
        $user->email       = $request->email;
        $user->password    = bcrypt($request->password);
        $user->gender      = $request->gender;
        $user->age         = $request->age;
        $user->state       = $request->state;
        $user->council     = $request->council;
        $user->parish      = $request->parish;
        $user->zone        = $request->zone;
        $user->phone        = $request->phone;
        $user->status      = $request->status;
        $user->type        = $request->type;
        $user->description = $request->description;
        $user->avatar      = 'default.png';
        $user->social      = false;
        $user->save();
        $user->roles()->sync($request->roles);
        if ($request->type == 'trad') {
            $trader                  = new Trader();
            $trader->name            = $request->name;
            $trader->ic              = $request->ic;
            $trader->age             = $request->age;
            $trader->gender          = $request->gender;
            $trader->email           = $request->email;
            $trader->state           = $request->state;
            $trader->council         = $request->council;
            $trader->parish          = $request->parish;
            $trader->zone            = $request->zone;
            $trader->phone           = $request->phone;
            $trader->photo           = 'default.png';
            $trader->description     = $request->description;
            $trader->save();
        }
        if ($request->type == 'emp') {
            $employee                    = new Employee();
            $employee->name              = $request->name;
            $employee->ic                = $request->ic;
            $employee->age               = $request->age;
            $employee->gender            = $request->gender;
            $employee->email             = $request->email;
            $employee->state             = $request->state;
            $employee->council           = $request->council;
            $employee->parish            = $request->parish;
            $employee->zone              = $request->zone;
            $employee->phone             = $request->phone;
            $employee->echelon           = 'A';
            $employee->service_beginning = date('Y-m-d H:i:s');
            $employee->typeofemployee_id = 1;
            $employee->photo             = 'default.png';
            $employee->description       = $request->description;
            $employee->save();
        }

        // if($test)
        // {
        //     return Response::json(['status'=>'success', 'message'=>'Save successful'], 200);
        // }
        // return Response::json(['status'=>'error', 'message'=>$request->messages()]);
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    public function edit($id)
    {
        //
    }


    public function update(Req $request, $id)
    {
        // $user= User::findOrFail($id);
        // $user->fill($request->all());
        // $user->update($request::all());
        // $user->save();
        // return Response::json($request::all());
        User::findOrFail($id)->update($request::all());
        return Response::json($request::all());
    }

    public function destroy($id)
    {
        return User::destroy($id);
    }

    public function showThisUser($id)
    {
        return view('test');
    }

    public function estado_utilizador(Request $request)
    {
        $id  = $request->id;
        // $id  = $request->input('id');
        $user = User::find($id);
        // $user = User::where('id', $id)->first();
        if ($user->status == true) {
            $user->status = false;
        }else {
            $user->status = true;
        }
        $user->save();
        return response($user, 200);
    }

    // // Outros Metodos
    public function getRoleForUser()
    {
        foreach (Auth::user()->roles as $role) {
            # code...
            if ($role->name == 'super-admin') {
                $roles = Role::all();
            }else{
                $roles= Role::where('name', '!=', 'admin')->where('name', '!=', 'super-admin')->get();
            }
        }
        return $roles;
    }

    public function authUser()
    {
        $user = Auth::user();
        $user->roles;
        return $user;
        // foreach (Auth::user()->roles as $role) {
        //     if ($role->name == 'super-admin') {
        //         $user = User::paginate($row);
        //         $user->each(function($user){
        //             $user->roles;
        //         });
        //         return $user;
        //     }else{
        //         // $thisUserRole = $role->where('name', 'admin')->where('name', 'super-admin')
        //
        //         // Supplier::has('products')->where('name', $name)->get();
        //
        //         // $user = User::has('roles')->where('name', '!=', 'admin')->paginate(10);
        //         $user = User::with('roles')->whereName(!$role->name)->paginate(10);
        //
        //
        //         // $user->each(function($user){
        //         //     $user->roles;
        //         // });
        //         return $user;
        //         // $roles= Role::where('name', '!=', 'admin')->where('name', '!=', 'super-admin')->get();
        //     }
        // }
    }
}
