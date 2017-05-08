<?php

namespace Sagmma\Http\Controllers\SocialControllers;
use Sagmma\Http\Controllers\Controller;
use Socialite;
use User;
use Auth;
use Social;
use Caffeinated\Flash\Facades\Flash;

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
            // dd($user);
            if ($this_user = User::select()->where('email', '=', $user->email)->where('status', '=', true)->first()) {
                Auth::login($this_user);
                Flash::success('Autenticação bem sucedida');
                return redirect('/');
            }elseif ($this_user = User::select()->where('email', '=', $user->email)->where('status', '=', false)->first()) {
                Flash::warning('Este email está registada numa conta desativada');
                return redirect('/');
            }else {
                $new_user              = new User();
                $new_user->name        = $user->name;
                $new_user->email       = $user->email;
                $new_user->status      = false;
                $new_user->type      = 'member';
                $new_user->avatar      =  'default.png';
                $new_user->social      = true;
                $new_user->save();
                $social = new Social();
                $social->user_id      = $new_user->id;
                $social->provider     = $provider;
                $social->uid_provider = $user->id;
                $social->save();
                Flash::success('Registo efectuado com sucesso aguerde a ativação');
                return redirect('/');
            }
        }else {
            return '!!ERRO!!';
        }
    }
}
