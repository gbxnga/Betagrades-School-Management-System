<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Teacher;

class TeacherLoginController extends Controller
{
    public function __construct()
    {
        // redirect people who arent logged in as admin
        $this->middleware('guest:teacher');
    }
    public function showLogin()
    {
        return view('auth.teacher-login');
    }

    public function login(Request $request)
    {
        // validate incoming request
        $this->validate($request, [
            'username'=>'required',
            'password'=>'required|min:5',

        ]);

        // attempt to login
        if(Auth::guard('teacher')->attempt(['username'=>$request->username, 'password'=>$request->password], $request->remember))
        {
            // if successful
            $teacher = Teacher::where('username', $request->username)->firstOrFail();
            //echo;exit();
            $request->session()->put('teacher_class_id', $teacher->class_id);
            $request->session()->put('teacher_id', $teacher->id);
            return redirect()->intended(route('teacher.dashboard'));

        }

        //if unsuccessful
        return redirect()->back()->withInput($request->only('username', 'remember'));
        
        
    }
}
