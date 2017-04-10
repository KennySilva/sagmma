<?php

namespace Sagmma\Http\Controllers\Auth;

// use Auth;
// use Illuminate\Routing\Controller as controll;

use User;
use Validator;
use Sagmma\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;




    // protected $redirectPath = '/dashboard';
    // protected $loginPath = '/login';
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('guest', ['except' => 'getLogout']);
    }
    // -------------------------------------------------------------------
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'                 => 'required|max:60|min:4',
            'username'             => 'required|max:30|min:2|unique:users',
            'ic'                   => 'required|digits:6|Integer|unique:users',
            'email'                => 'required|email|Between:3,60|unique:users',
            'password'             => 'required|AlphaNum|Between:4,8|confirmed',
            'g-recaptcha-response' => 'required',
            'type'             => 'required',
        ]);
    }
    // -------------------------------------------------------------------

    public function messages()
    {
        return [
            'email.required'=>'Porra'
        ];
    }

    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'username' => $data['username'],
            'ic'       => $data['ic'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
            'type'    => $data['type'],
            'social' => false,
        ]);
    }

    

    // public function authenticate()
    // {
    //     if (Auth::attempt(['email' => $email, 'password' => $password, 'status'=>1])) {
    //         return redirect()->intended($this->redirectPath());
    //     }
    // }


}
