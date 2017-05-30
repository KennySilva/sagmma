<?php

namespace Sagmma\Http\Controllers\PluginsControllers;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use PDF;
use Carbon\Carbon;
// use Typeofplace;
use User;
use Employee;
use Taxation;

class PrintController extends Controller
{
    // ----------------------------------Users-----------------------------------------------
    public function indexUser()
    {
        $totalUsers = User::count();
        return view('exportation.PrintUser', compact('totalUsers'));
    }
    public function printUserPreview()
    {
        $users = User::all();
        return view('exportation.printPreview', compact('users'));
    }
    // --------------------------------Employee------------------------------------------------------
    public function indexEmployee()
    {
        $totalEmployees = Employee::count();
        return view('exportation.PrintEmployee', compact('totalEmployees'));
    }
    public function printEmployeePreview()
    {
        $employees = Employee::all();
        return view('exportation.printEmployeePreview', compact('employees'));
    }
    // -------------------------------Taxations------------------------------------------------------
    public function printThisReport($date)
    {
        $taxations = Taxation::whereDate('created_at', '=', $date)->get();
        $total = $taxations->sum('income');

        return view('exportation.printThisReport', compact('taxations', 'date', 'total'));

    }
    public function dateReport($date)
    {
        $taxations = Taxation::whereDate('created_at', '=', $date)->get();
        $total = $taxations->sum('income');

        if (count($taxations) > 0) {
            return view('exportation.printDateReport', compact('taxations', 'date', 'total'));
        }else {
            return abort(408, 'Unauthorized action.');
        }

    }
    // ---------------------------------------------------------------------------------------------
    public function monthReport($month, $year)
    {
        $taxations = Taxation::whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->get();
        $total = $taxations->sum('income');

        if (count($taxations) > 0) {
            return view('exportation.printMonthReport', compact('taxations', 'month', 'year','total'));
        }else {
            return abort(408, 'Unauthorized action.');
        }

    }

    public function printThisMonthReport($month, $year)
    {
        $taxations = Taxation::whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->get();
        $total = $taxations->sum('income');

        return view('exportation.printThisMonthReport', compact('taxations', 'month', 'year','total'));

    }
    // ----------------------------------------------------------------------------------------------


    // ---------------------------------------------------------------------------------------------
    public function yearReport($year)
    {
        $taxations = Taxation::whereYear('created_at', '=', $year)->get();
        $total = $taxations->sum('income');

        if (count($taxations) > 0) {
            return view('exportation.printYearReport', compact('taxations', 'year','total'));
        }else {
            return abort(408, 'Unauthorized action.');
        }

    }

    public function printThisYearReport($year)
    {
        $taxations = Taxation::whereYear('created_at', '=', $year)->get();
        $total = $taxations->sum('income');

        return view('exportation.printThisYearReport', compact('taxations', 'year','total'));

    }
    // ----------------------------------------------------------------------------------------------

    public function receiptIndex($id)
    {
        $taxation = Taxation::find($id);
        // return $taxation;
        return view('exportation.printReceipt', compact('taxation', 'id'));
    }
    public function printReceipt($id)
    {
        $taxation = Taxation::find($id);
        return view('exportation.printThisReceipt', compact('taxation'));

    }
}
