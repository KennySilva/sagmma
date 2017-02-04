<?php

namespace Sagmma\Http\Controllers\PluginsControllers;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use PDF;
// use Typeofplace;
use User;

class PrintController extends Controller
{
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
}
