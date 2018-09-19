<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginParentController extends Controller
{
    public function index()
    {
        return view('parent.login');
    }
}
