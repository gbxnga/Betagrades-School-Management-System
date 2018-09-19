<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\Timetable;
Use App\Subject;
Use App\TheClass;
use Auth;

class TimetableController extends Controller
{
    public function __construct() 
    {
       // $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::guard('teacher')->check()){
            //$teacher_class_id = Auth::user()->class_id;
            //exit(Auth::user()->id);
            $teacher_class_id = session('teacher_class_id');
            //$classes = TheClass::whereId($teacher_class_id)->firstOrFail();
            $classes = DB::select('SELECT * FROM the_classes WHERE id ='.$teacher_class_id);
            //print_r($classes);exit();
        }
        else
        {
            $classes = TheClass::all();
        }
        //print_r($classes);exit();
        return view('timetable.index', compact('classes'));
    }
    public function create(Request $request, $id)
    {

        for ($i=0;$i<5;$i++){
            if ($i === 0) $d = 'mon';
            elseif ($i === 1) $d = 'tue';
            elseif ($i === 2) $d = 'wed';
            elseif ($i === 3) $d = 'thu';
            elseif ($i === 4) $d = 'fri';

            $p1 = $request->get(''.$d.'_1');
            $p2 = $request->get(''.$d.'_2');
            $p3 = $request->get(''.$d.'_3');
            $p4 = $request->get(''.$d.'_4');
            $p5 = $request->get(''.$d.'_5');
            $p6 = $request->get(''.$d.'_6');
            $p7 = $request->get(''.$d.'_7');
            $p8 = $request->get(''.$d.'_8');
            $timetable = new Timetable(array(
                'class_id' => $request->get('class_id'),
                'day' => strtoupper($d),
                'P1' => $p1,
                'P2' => $p2,
                'P3' => $p3,
                'P4' => $p4,
                'P5' => $p5,
                'P6' => $p6,
                'P7' => $p7,
                'P8' => $p8,
            ));
            $timetable->save();
        }
        if (Auth::guard('teacher')->check()) $url = '/teacher/timetable/view/';
        else if (Auth::guard('admin')->check()) $url = '/admin/timetable/view/';
        return redirect($url.$request->get('class_id'))->with('status', 'Timetable Saved');

    }
    public function update(Request $request, $id)
    {   
        // delete class timetable record
        $sql = 'DELETE FROM timetables WHERE class_id ='.$id;
        DB::select($sql);

        // continue to save a fresh one
        for ($i=0;$i<5;$i++){
            if ($i === 0) $d = 'mon';
            elseif ($i === 1) $d = 'tue';
            elseif ($i === 2) $d = 'wed';
            elseif ($i === 3) $d = 'thu';
            elseif ($i === 4) $d = 'fri';

            $p1 = $request->get(''.$d.'_1');
            $p2 = $request->get(''.$d.'_2');
            $p3 = $request->get(''.$d.'_3');
            $p4 = $request->get(''.$d.'_4');
            $p5 = $request->get(''.$d.'_5');
            $p6 = $request->get(''.$d.'_6');
            $p7 = $request->get(''.$d.'_7');
            $p8 = $request->get(''.$d.'_8');
            $timetable = new Timetable(array(
                'class_id' => $request->get('class_id'),
                'day' => strtoupper($d),
                'P1' => $p1,
                'P2' => $p2,
                'P3' => $p3,
                'P4' => $p4,
                'P5' => $p5,
                'P6' => $p6,
                'P7' => $p7,
                'P8' => $p8,
            ));
            $timetable->save();
        }
        if (Auth::guard('teacher')->check()) $url = '/teacher/timetable/view/';
        else if (Auth::guard('admin')->check()) $url = '/admin/timetable/view/';
        return redirect($url.$request->get('class_id'))->with('status', 'Timetable Updated');
    }

    public function show($id)
    {
        $clas = TheClass::whereId($id)->firstOrFail();
        if (Auth::guard('teacher')->check())
        {
            $C_id = session('teacher_class_id');
            $classes = TheClass::whereId($C_id)->get();
        }
        else
        {
            $classes = TheClass::all();
        }
        
        $sql = 'SELECT * FROM timetables WHERE class_id ='.$id;
        $timetables = DB::select($sql);
        $subjects = Subject::all();
        $edit = array('editmode'=>'true');
        return view('timetable.class', compact('timetables','classes','subjects','edit', 'clas'));
    }

    public function form($id)
    {
        // check if timetable has already been created for subject
        $sql = 'SELECT id FROM timetables WHERE class_id ='.$id;
        $noo = DB::select($sql);
        if (count($noo)>0)
        {
            // theres already a timetable for this class
            // redirect to edit page
            if (Auth::guard('teacher')->check()) $url = '/teacher/timetable/edit/';
            else if (Auth::guard('admin')->check()) $url = '/admin/timetable/edit/';
            return redirect($url.$id)->with('status', 'You have already created a timetable for this subject. You may like to edit it.');
            exit();
        }
        $subjects = Subject::all();
        $clas = TheClass::whereId($id)->firstOrFail();
        return view('timetable.vieww', compact('clas','subjects'));
    }

    public function index_create()
    {
        if (Auth::guard('teacher')->check()){
            $id = session('teacher_class_id');
            return redirect('/teacher/timetable/create/'.$id)->with('status', 'You are the class teacher for this class.');
        }
        else
        {
            $classes = TheClass::all();
        }
        $edit = array('editmode'=>'false');
        return view('timetable.cr', compact('classes','edit'));
    }

    public function edit_form($id)
    {
        // check if timetable exists first
        $check = Timetable::where('class_id', $id)->get()->count();
       
        if ($check < 1)
        {
            return redirect(action('TimetableController@form', $id))->with('status', 'Timetable doestnt exist and cannot be editted. Please create one.');
            
        }

        $sql = 'SELECT * FROM timetables WHERE class_id ='.$id;
        $timetables = DB::select($sql);
        $subjects = Subject::all();
        //print_r($subjects);exit();
        $clas = TheClass::whereId($id)->firstOrFail();
        return view('timetable.edit', array( 'clas'=>$clas))->with('timetables', json_encode($timetables,true))->with('subjects', json_encode($subjects,true));

    }

}
