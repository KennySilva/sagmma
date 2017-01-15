<?php

namespace Sagmma\Http\Controllers\SocialControllers;
use Sagmma\Http\Controllers\Controller;
use Illuminate\Http\Request;
use User;
use Auth;
use Socialite;

class SocialController extends Controller
{
    public function _construct()
    {
        $this->middleware('guest');
    }

    public function getSocialAuth($provider = null)
    {
        if (!config("services.$provider")) abort(404);
        return Socialite::driver($provider)->redirect();
    }

    public function getSocialAuthCallback($provider = null)
    {
        if ($user = Socialite::driver($provider)->user()) {
            dd($user);
        }else {
            return '!!!!Algo não certo!!!!!';
        }
    }


    // public function redirectToProvider()
    // {
    //     dd('EStou aqui');
    // 
    //     return Socialite::driver('facebook')->redirect();
    //     // return Socialite::with('facebook')->redirect();
    // }
    //
    //
    // public function handleProviderCallback()
    // {
    //
    //     $user = Socialite::driver('facebook')->user();
    //     // $user = Socialite::with('facebook')->user();
    //
    //     // $user->token;
    // }

}
