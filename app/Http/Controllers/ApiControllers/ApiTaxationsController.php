<?php

namespace Sagmma\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;

use Request as Req;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Sagmma\Http\Requests\SagmmaRequests\TaxationsRequest;
use Taxation;
use Employee;
use Place;
use Response;
use Input;
use Auth;
use Mail;
use PDF;


class ApiTaxationsController extends Controller
{
    public function index($row, $type)
    {
        if ($type == 1) {
            $taxation = Taxation::where('type', '=', 1)->paginate($row);
        }elseif ($type == 2) {
            $taxation = Taxation::where('type', '=', 2)->paginate($row);
        }else {
            $taxation = Taxation::paginate($row);
        }
        $taxation->each(function($taxation){
            $taxation->employees;
            $taxation->places->load('traders');
        });
        return $taxation;
    }

    public function create()
    {

    }

    public function store(TaxationsRequest $request)
    {
        $employee = Employee::where('ic', '=', Auth::user()->ic);
        $taxation= new Taxation();
        $place_id = $request->place_id;
        $place = Place::where('id', '=', $place_id)->first();
        if ($request->type == 1) {
            $taxation->employee_id = $employee->id;
            $taxation->income      = $place->price;
        }else {
            $taxation->employee_id = $request->employee_id;
            $taxation->income      = $request->income;
        }
        $taxation->place_id    = $place_id;
        $taxation->type        = $request->type;
        $taxation->author      = Auth::user()->name;
        $taxation->save();
    }

    public function show($id)
    {
        $taxation = Taxation::findOrFail($id);
        $taxation->employees;
        $taxation->places->load('traders');
        return $taxation;

    }

    public function edit($id)
    {
        //
    }

    public function update(TaxationsRequest $request, $id)
    {
        $place_id = $request->place_id;
        $place = Place::where('id', '=', $place_id)->first();
        if ($request->type == 1) {
            $employee_id = Auth::user()->id;
            $income      = $place->price;
        }else {
            $employee_id = $request->employee_id;
            $income      = $request->income;
        }
        $place_id    =  $request->place_id;
        $type        = $request->type;
        $author      = Auth::user()->name;

        $taxation = new Taxation();
        $taxation->where('id', $id)->update(array(
            'employee_id' => $employee_id,
            'place_id'    => $place_id,
            'income'      => $income,
            'type'        => $type,
            'author'      => $author
        ));

    }

    public function destroy($id)
    {
        return Taxation::destroy($id);
    }

    //Metodos de auxilio
    public function getEmployeeForTaxation()
    {
        $employees = Employee::wherehas('typeofemployees', function($type)
        {
            $type->where('name', '=', 'Ajudantes dos Serviços Gerais')->orWhere('name', '=', 'Cobradores')->orWhere('name', '=', 'Vigilantes');
        })->get();
        return $employees;
    }

    // --------------------------------------------------------------------------------------
    public function getPlaceExtForTaxation()
    {
        $place = Place::whereDoesntHave('traders')->whereHas('typeofplace', function ($type)
        {
            $type->orderBy('name', 'asc')->where('name', '=', 'Outros');
        })->get();
        return $place;
    }

    public function getPlaceIntForTaxation()
    {
        $place = Place::has('traders')->whereHas('typeofplace', function ($type)
        {
            $type->orderBy('name', 'asc')->where('name', '!=', 'Outros');
        })->get();
        return $place;
    }

    public function sendTaxation($id, $sendTaxation)
    {
        $owner = Auth::user()->email;
        $taxation = Taxation::findOrFail($id);
        $email = $sendTaxation;
        $code = str_random(30);
        //  $data = array('owner'=>$owner, 'taxation'=>$taxation, 'email'=>$email);
        Mail::send('emails.sendTaxation', ['taxation' => $taxation, 'code'=>$code], function($ms) use ($email, $owner){
            $ms->subject('Recibo de Cobrança de Imposto');
            $ms->to($email);
            $ms->from($owner, 'Your Application');
        });
    }

}
