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



class TaxationsController extends Controller
{
    public function index()
    {
        // $data = Taxation::select('employee_place.employee_id', DB::raw('sum(employee_place.income) as aggregate'))->groupBy(DB::raw('employee_place.employee_id'))->get(); //must alias the aggregate column as aggregate
        //
        // $chart = Charts::database($data)->preaggregated(true)->lastByDay(7, false);







        $chart = Charts::database(Taxation::all(), 'pie', 'fusioncharts')->dateColumn('created_at')
        ->elementLabel("Total")
        ->dimensions(1000, 500)
        ->responsive(false)
        ->groupBy('employee_id');
        
        return view('_backend.taxations.show', ['chart' => $chart]);
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
