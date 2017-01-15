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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'ic' => 'required|max:6|unique:users',
            'email' => 'required|email|max:255|unique:users',
            // 'email' => 'required|email|max:255|exists:users,email,status,1|unique:users',
            'password' => 'required|confirmed|min:6',
            'g-recaptcha-response' => 'required',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'ic' => $data['ic'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    // public function authenticate()
    // {
    //     if (Auth::attempt(['email' => $email, 'password' => $password, 'status'=>1])) {
    //         return redirect()->intended($this->redirectPath());
    //     }
    // }


}
