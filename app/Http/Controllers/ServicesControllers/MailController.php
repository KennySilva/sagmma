<?php

namespace Sagmma\Http\Controllers\ServicesControllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use Redirect;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;

class MailController extends Controller
{

    public function mailToSagmma(Request $request)
    {
        Mail::send('emails.contactGeneric', $request->all(), function($ms){
            $ms->subject('Mercado Novo de Achada Riba');
            $ms->to('sagmmatcc@gmail.com');
            Session::flash('msg', 'Mensagem enviado corretamente');
            return Redirect::to('/');
            
        });
    }
    public function mailToDirector(Request $request)
    {
        Mail::send('emails.contactDirector', $request->all(), function($ms){
            $ms->to('director@gmail.com');
            Session::flash('msg', 'Mensagem enviado para o director corretamente');
            return Redirect::to('/');

        });
    }
    public function mailToManager(Request $request)
    {
        Mail::send('emails.contactManager', $request->all(), function($ms){
            $ms->to('manager@gmail.com');
            Session::flash('msg', 'Mensagem enviado para o(a) Gestor(a) corretamente');
            return Redirect::to('/');

        });
    }
    public function mailToAux(Request $request)
    {
        Mail::send('emails.contactAux', $request->all(), function($ms){
            $ms->to('aux@gmail.com');
            Session::flash('msg', 'Mensagem enviado para o Auxiliar administrativo Corretamente corretamente');
            return Redirect::to('/');

        });
    }
}
