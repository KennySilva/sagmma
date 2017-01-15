<?php

namespace Sagmma\Http\Controllers\Auth;

use Sagmma\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{

    use ResetsPasswords;

    public function __construct()
    {
        $this->middleware('guest');
    }
}
