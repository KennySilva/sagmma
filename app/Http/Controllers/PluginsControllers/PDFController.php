<?php

namespace Sagmma\Http\Controllers\PluginsControllers;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use PDF;
use Typeofplace;
Use Taxation;
Use Employee;
Use Auth;

class PDFController extends Controller
{
    public function getPDF($value='')
    {
        $datas = Typeofplace::all();
        $pdf = PDF::loadView('pdf.customer', ['datas' => $datas]);
        return $pdf->download('fuck.pdf');
        // return $pdf->stream('fuck.pdf');
    }

    public function TaxationsPDF()
    {
        $datas = Taxation::all();
        $pdf = PDF::loadView('pdf.taxationReport', ['datas' => $datas]);
        return $pdf->download('relatoriocobarnca.pdf');
    }

    public function employees_PDF()
    {
        $employee = Employee::all();
        $pdf = PDF::loadView('pdf.employeesPDF', ['employee' => $employee]);
        return $pdf->download('todos_os_funciuonarios.pdf');
    }

    public function downloadreciboempdf($id, $code)
    {
        $taxation = Taxation::findOrFail($id);
        $pdf = PDF::loadView('pdf.sendTaxation', ['taxation' => $taxation]);
        return $pdf->download('relatoriocobarnca.pdf');
    }

    public function downloadAllEmployeesinpdf()
    {
        $employees = Employee::all();
        $pdf = PDF::loadView('pdf.sendEmployee', ['employees' => $employees]);
        return $pdf->download('allEmployee.pdf');
    }




}
