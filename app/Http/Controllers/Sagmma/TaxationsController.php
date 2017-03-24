<?php

namespace Sagmma\Http\Controllers\Sagmma;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Taxation;
use Charts;
use Employee;
use Typeofplace;
use DB;
use User;



class TaxationsController extends Controller
{
    public function index()
    {
        $chart = Charts::database(Taxation::all()->where('type', '1'), 'line', 'highcharts')
        ->dateColumn('created_at')
        ->dimensions(0, 400)
        ->aggregateColumn('income', 'sum')
        ->groupByMonth('2017', true)
        ->elementLabel("Total de Cobrança por dia")
        ->title('Cobranças Internos');

        $chart1 = Charts::database(Taxation::all()->where('type', '2'), 'bar', 'highcharts')
        ->dateColumn('created_at')
        ->dimensions(0, 400)
        ->aggregateColumn('income', 'sum')
        ->lastByDay(7, true)
        ->elementLabel("Total de Cobrança por dia")
        ->title('Cobranças Externos');

        return view('_backend.taxations.show', ['chart' => $chart, 'chart1' => $chart1]);
    }

    public function create()
    {
        return view('_backend.taxations.create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
