<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\Calendar;
Use App\News;
Use App\TheClass;
Use App\Student;

class ParentController extends Controller
{

    
    public function doLogin(Request $request)
    {
        $student_Admission_no = $request->get('admission_no');
        $student = Student::where('admission_no',$student_Admission_no)->get()->count();
        
        
        if (($student)===1)
        {
            //echo ($student);exit();
            $student = Student::where('admission_no',$student_Admission_no)->firstOrFail();
            //echo;exit();
            $request->session()->put('users', 'parent');
            //foreach ($st)
            $request->session()->put('user_class_id', $student->class_id);
            $request->session()->put('user_student_id', $student->id);
            $request->session()->put('user_student_name', $student->firstnam.' '.$student->lastname);
            return redirect(action('ParentController@index'));
        }
        else
        {
            //return redirect('parent/login')->with('status','Student doesn\'nt exist');
            $status = array('sta'=>'Student doesn\'nt exist');
            return view('parent.login', compact('status'));
        }

    }
    public function showLogin(Request $request)
    {
        // if user is already logged in, take them to index page
        if ( ( $request->session()->has('users') ) ) {
            return redirect(action('ParentController@index'));
            
        }
        else
        {
            return view('parent.login');
        }

    }
    public function profile(Request $request)
    {
        if ( !( $request->session()->has('users') ) ) {
            return redirect(action('ParentController@showLogin'));
            
        }
        $student_id = session('user_student_id');
        
        $student = Student::whereId($student_id)->firstOrFail();
        $clas = TheClass::whereId($student->class_id)->firstOrFail();
        return view('parent.index', compact('student', 'clas'));
    }

    public function result(Request $request)
    {
        if ( !( $request->session()->has('users') ) ) {
            return redirect(action('ParentController@showLogin'));
            
        }
        return view('parent.result');
    }

    public function timetable(Request $request)
    {
        if ( !( $request->session()->has('users') ) ) {
            return redirect(action('ParentController@showLogin'));
            
        }
        $class_id = session('user_class_id');
        $clas = TheClass::whereId($class_id)->firstOrFail();
        $sql = 'SELECT * FROM timetables WHERE class_id = 1';
        $timetables = DB::select($sql);
        return view('parent.timetable', compact('timetables', 'clas'));
    }
    public function attendance(Request $request)
    {
        if ( !( $request->session()->has('users') ) ) {
            return redirect(action('ParentController@showLogin'));
            
        }
        //$_SESSION['users'] = 'parent';
        //echo $_SESSION['users'];exit();
        $student_id = session('user_student_id');
        $sql =  'SELECT type, attendance_date FROM attendances where student_id = '.$student_id;
        $attendances = DB::select($sql);
        return view('parent.attendance', compact('attendances'));
    }

    public function schedule(Request $request)
    {
        if ( !( $request->session()->has('users') ) ) {
            return redirect(action('ParentController@showLogin'));
            
        }
        $class_id = session('user_class_id');
        $class = TheClass::whereId($class_id)->firstOrFail();
        $schedules = DB::select('SELECT id FROM exam_schedules WHERE class_id = '.$class_id);
        $CA1S = DB::select('SELECT s.name AS subject, e.date, start_time, end_time FROM exam_schedules e INNER JOIN subjects s ON (s.id = e.subject_id)  WHERE exam = "CA 1" AND class_id ='.$class_id);
        $CA2S = DB::select('SELECT s.name AS subject, e.date, start_time, end_time FROM exam_schedules e INNER JOIN subjects s ON (s.id = e.subject_id)  WHERE exam = "CA 2" AND class_id ='.$class_id);
        $EXAMS = DB::select('SELECT s.name AS subject, e.date, start_time, end_time FROM exam_schedules e INNER JOIN subjects s ON (s.id = e.subject_id)  WHERE exam = "EXAM" AND class_id ='.$class_id);
       
        return view('parent.schedule', compact('CA1S', 'CA2S', 'EXAMS', 'class'));
    }

    public function index(Request $request)
    {
        if ( !( $request->session()->has('users') ) ) {
            return redirect(action('ParentController@showLogin'));
            
        }
        $events = Calendar::all();
        $news = News::all();

        return view('parent.calendar', compact('events', 'news'));
    }
}
