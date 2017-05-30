<?php

namespace Sagmma\Http\Controllers\ServicesControllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use Redirect;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Caffeinated\Flash\Facades\Flash;


class MailController extends Controller
{

    public function mailToSagmma(Request $request)
    {
        Mail::send('emails.contactGeneric', $request->all(), function($ms){
            $ms->subject('Mercado Novo de Achada Riba');
            $ms->to('sagmmatcc@gmail.com');
        });
        Flash::success('Correio eletronico Enviado com Sucesso');
        return redirect()->back();
    }
    }
    public function mailToDirector(Request $request)
    {
        Mail::send('emails.contactDirector', $request->all(), function($ms){
            $ms->to('keypasempre@gmail.com');

        });
        Flash::success('Correio eletronico Enviado com Sucesso');
        return redirect()->back();
    }
    public function mailToManager(Request $request)
    {
        Mail::send('emails.contactManager', $request->all(), function($ms){
            $ms->to('keypasempre@gmail.com');
        });
        Flash::success('Correio eletronico Enviado com Sucesso');
        return redirect()->back();
    }
    public function mailToAux(Request $request)
    {
        Mail::send('emails.contactAux', $request->all(), function($ms){
            $ms->to('keypasempre@gmail.com');
        });
        Flash::success('Correio eletronico Enviado com Sucesso');
        return redirect()->back();
    }
}
