<?php

namespace Sagmma\Http\Controllers\ServicesControllers;

use Illuminate\Http\Request;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Charts;
use User;
use Taxation;

class ChartsController extends Controller
{
    public function TestChart()
    {
        $chart = Charts::multi('bar', 'material')
        ->title("My Cool Chart")
        ->dimensions(0, 400)
        ->template("material")
        ->dataset('Element 1', [5,20,100])
        ->dataset('Element 2', [15,30,80])
        ->dataset('Element 3', [25,10,40])
        ->labels(['One', 'Two', 'Three']);
        return view('_backend.taxations.show', ['chart' => $chart]);
    }

}
