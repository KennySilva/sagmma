<?php

namespace Sagmma\Http\Controllers\ApiControllers;
use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\UsersRequest;
use User;
use Role;
use Response;
use Input;

class ApiUsersController extends Controller
{
    public function index()
    {
        //
        // $ex= User::where('name', '!=', 'Admin')->get();
        // return $ex;
        $user = User::paginate(5);
        $user->each(function($user){
            $user->roles;
        });
        return $user;
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
        $user->save();
        $user->roles()->sync($request->roles);

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
        $roles = Role::all();
        return $roles;
    }
}
