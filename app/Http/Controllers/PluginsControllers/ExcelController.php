<?php

namespace Sagmma\Http\Controllers\PluginsControllers;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Typeofplace;
use Input;
use DB;
use Excel;
class ExcelController extends Controller
{
    public function getImport()
    {
        return view('exportation.exportTypeofplace');
    }

    public function postImport()
    {
        Excel::load(Input::file('typeofplace'), function($reader)
        {
            $reader->each(function($sheet){
                Typeofplace::firstOrCreate($sheet->toArray());
            });
        });
    }
}
