<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        // redirect people who arent logged in as admin
        $this->middleware('guest:admin');
    }
    public function showLogin()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        // validate incoming request
        $this->validate($request, [
            'username'=>'required',
            'password'=>'required|min:5',

        ]);

        // attempt to login
        if(Auth::guard('admin')->attempt(['username'=>$request->username, 'password'=>$request->password], $request->remember))
        {
            // if successful
            return redirect()->intended(route('admin.dashboard'));

        }

        //if unsuccessful
        return redirect()->back()->withInput($request->only('username', 'remember'));
        
        
    }
}
