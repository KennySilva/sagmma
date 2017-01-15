<?php

namespace Sagmma\Http\Controllers\PluginsControllers;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use PDF;
use Typeofplace;

class PrintController extends Controller
{
    public function index()
    {
        return view('exportation.viewPrint');
    }

    public function printPreview()
    {
        $types = Typeofplace::all();
        return view('exportation.printPreview', compact('types'));
    }
}
