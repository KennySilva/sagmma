<?php

namespace Sagmma\Http\Controllers\Test;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use PDF;
use Typeofplace;

class TypeController extends Controller
{
    public function index()
    {
        $types= Typeofplace::all();
        return view('typetest', compact('types'));
    }
}
