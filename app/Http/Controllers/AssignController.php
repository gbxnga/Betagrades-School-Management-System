<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\TheClass;
Use App\Subject;
Use App\Teacher;
Use App\Assign;

class AssignController extends Controller
{
    public function index()
    {
        $classes = TheClass::all();
        return view('assign.index', compact('classes'));
    }

    public function form($id)
    {

        $sql = 'SELECT a.id, s.name AS s_name, t.name AS t_name, t.id AS t_id FROM assigns a INNER JOIN teachers t ON (t.id = a.teacher_id) 
        INNER JOIN subjects s ON (a.subject_id = s.id) WHERE a.class_id ='.$id;
        $assigns = DB::select($sql);
        $classes = TheClass::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $clas = TheClass::whereId($id)->firstOrFail();
        //$class->delete();
        //return redirect('/admin/classes')->with('status', 'The class has been deleted!');
        $edit = array('editmode'=>'true');
        return view('assign.index', compact('classes', 'subjects', 'teachers', 'clas', 'edit', 'assigns'));
        //return view('assign.index', compact('classes', 'clas'));

    }
    public function create(Request $request, $id)
    {
        $assign = new Assign(array(
            'class_id' => $request->get('class_id'),
            'subject_id' => $request->get('subject_id'),
            'teacher_id' => $request->get('teacher_id'),
        ));
        $assign->save();
        //$classes = TheClass::all();
        return redirect('/admin/teacher/assign/'.$id)->with('status', 'Subject/Teacher Successfully assigned');

    }
    public function delete($id)
    {
        $assign = Assign::whereId($id)->firstOrFail();
        $c_id = $assign->class_id;
        $assign->delete();
        return redirect('/admin/teacher/assign/'.$c_id)->with('status', 'Subject/Teacher assignment deleted!');
    }
}
