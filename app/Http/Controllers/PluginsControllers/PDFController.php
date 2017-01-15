<?php

namespace Sagmma\Http\Controllers\PluginsControllers;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use PDF;
use Typeofplace;

class PDFController extends Controller
{
    public function getPDF($value='')
    {
        $datas = Typeofplace::all();
        $pdf = PDF::loadView('pdf.customer', ['datas' => $datas]);
        return $pdf->download('customer.pdf');
        // return $pdf->stream('customer.pdf');
    }
}
