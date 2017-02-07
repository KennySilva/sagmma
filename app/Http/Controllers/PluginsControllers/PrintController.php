<?php

namespace Sagmma\Http\Controllers\PluginsControllers;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use PDF;
// use Typeofplace;
use User;
use Employee;

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
}
