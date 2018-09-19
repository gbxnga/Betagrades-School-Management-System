<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\TheClass;
use App\Student;
use App\Mark;
use Auth;

class MarkController extends Controller
{
    private function getClasses()
    {
        if (Auth::guard('teacher')->check()){
            $C_id = session('teacher_class_id');
            $classes = TheClass::whereId($C_id)->get();
        }
        else
        {
            $classes = TheClass::all();
        }
        return $classes;
    }
    public function index()
    {
        $classes = $this->getClasses();
        $edit = array('editmode'=>'false');
        return view('mark.index', compact('classes', 'edit'));
    }
    public function selectClassForm()
    {
        $classes = $this->getClasses();
        $edit = array('editmode'=>'false');
        return view('mark.create', compact('classes', 'edit'));
    }
    public function viewMarks(Request $request)
    {
        $class_id = $request->get('class_id');
        $exam = $request->get('exam');

        // check if score have been given for this class for this subject
        $sql = "SELECT m.id AS m_id,s.id AS s_id, sc.id AS sch_id, s.lastname, m.mark, sc.exam, sc.date FROM marks m 
        INNER JOIN exam_schedules sc ON (m.exam_schedule_id = sc.id) INNER JOIN students s ON (s.id = m.student_id) 
        WHERE  sc.exam = '$exam' AND sc.class_id =". $class_id;
        $marks_check = DB::select($sql);
        if (count($marks_check)>0)
        {
            // grab and display them for edit
            $marks = $marks_check;
        
            
        }

        $schedules = DB::select('SELECT * FROM exam_schedules WHERE exam = "'.$exam.'" AND class_id ='.$class_id);

        // grab a list of all students assigned in this class
        $subjects = DB::select("SELECT s.id AS subject_id, s.name AS subject FROM assigns a INNER JOIN subjects s ON (s.id = a.subject_id) INNER JOIN the_classes c ON (c.id = a.class_id) WHERE c.id = ".$class_id);
        //print_r($subjects);exit();
        $clas = TheClass::whereId($class_id)->firstOrFail();

        // list of students in this class
        $students = DB::select('SELECT *, CONCAT(firstname, \' \', lastname) AS name FROM students WHERE class_id = '.$class_id);
        $classes = $this->getClasses();
        $edit = array('editmode'=>'true');
        return view('mark.index', compact('classes', 'edit', 'clas', 'subjects', 'request', 'schedules', 'students','marks'));
    }

    public function marksForm(Request $request)
    {
        $class_id = $request->get('class_id');
        $exam = $request->get('exam');

        // check if score have been given for this class for this subject
        $sql = "SELECT m.id AS m_id,s.id AS s_id, sc.id AS sch_id, s.lastname, m.mark, sc.exam, sc.date FROM marks m 
        INNER JOIN exam_schedules sc ON (m.exam_schedule_id = sc.id) INNER JOIN students s ON (s.id = m.student_id) 
        WHERE  sc.exam = '$exam' AND sc.class_id =". $class_id;
        $marks_check = DB::select($sql);
        if (count($marks_check)>0)
        {
            // grab and display them for edit
            $marks = $marks_check;
        
            
        }

        $schedules = DB::select('SELECT * FROM exam_schedules WHERE exam = "'.$exam.'" AND class_id ='.$class_id);

        // grab a list of all students assigned in this class
        $subjects = DB::select("SELECT s.id AS subject_id, s.name AS subject FROM assigns a INNER JOIN subjects s ON (s.id = a.subject_id) INNER JOIN the_classes c ON (c.id = a.class_id) WHERE c.id = ".$class_id);
        //print_r($subjects);exit();
        $clas = TheClass::whereId($class_id)->firstOrFail();

        // list of students in this class
        $students = DB::select('SELECT *, CONCAT(firstname, \' \', lastname) AS name FROM students WHERE class_id = '.$class_id);
        $classes = $this->getClasses();
        $edit = array('editmode'=>'true');
        return view('mark.create', compact('classes', 'edit', 'clas', 'subjects', 'request', 'schedules', 'students','marks'));
    }

    public function saveMark(Request $request)
    {
        $exam = $request->get('exam');
        $submit = $request->get('submit');
        $class_id = $request->get('class_id');

        $students = DB::select('SELECT *, CONCAT(firstname, \' \', lastname) AS name FROM students WHERE class_id = '.$class_id);
        $subjects = DB::select("SELECT s.id AS subject_id, s.name AS subject FROM assigns a INNER JOIN subjects s ON (s.id = a.subject_id) INNER JOIN the_classes c ON (c.id = a.class_id) WHERE c.id = ".$class_id);
        $schedules = DB::select('SELECT * FROM exam_schedules WHERE exam = "'.$exam.'" AND class_id ='.$class_id);
        

        $subjects = json_decode(json_encode($subjects), true);
        $students = json_decode(json_encode($students), true);
        $schedules = json_decode(json_encode($schedules), true);
        

        foreach ($students as $student)
        {
            foreach ($subjects as $subject)
            {
            
                foreach ($schedules as $schedule)
                {
                    if ($schedule['subject_id'] === $subject['subject_id'])
                    {
                        $mark = $request->get('mark_'.$schedule['id'].'_'.$student['id']);
                        $marks = new Mark(array(
                                    'exam_schedule_id' => $schedule['id'],
                                    'student_id' => $student['id'],
                                    'mark' => $mark,
                        ));
                        $marks->save();
                    }
                }           
            }                                        
        }
        if (Auth::guard('teacher')->check()) $url = '/teacher/mark/create';
        else if (Auth::guard('admin')->check()) $url = '/admin/mark/create';
        return redirect($url)->with('status', 'Marks saved');
    }

    public function updateMark(Request $request)
    {
        $exam = $request->get('exam');
        $submit = $request->get('submit');
        $class_id = $request->get('class_id');

        $students = DB::select('SELECT *, CONCAT(firstname, \' \', lastname) AS name FROM students WHERE class_id = '.$class_id);
        $subjects = DB::select("SELECT s.id AS subject_id, s.name AS subject FROM assigns a INNER JOIN subjects s ON (s.id = a.subject_id) INNER JOIN the_classes c ON (c.id = a.class_id) WHERE c.id = ".$class_id);
        $schedules = DB::select('SELECT * FROM exam_schedules WHERE exam = "'.$exam.'" AND class_id ='.$class_id);
        $sql = "SELECT m.id AS m_id,s.id AS s_id, sc.id AS sch_id, s.lastname, m.mark, sc.exam, sc.date FROM marks m 
        INNER JOIN exam_schedules sc ON (m.exam_schedule_id = sc.id) INNER JOIN students s ON (s.id = m.student_id) 
        WHERE  sc.exam = '$exam' AND sc.class_id =". $class_id;
        $marks = DB::select($sql);

        $subjects = json_decode(json_encode($subjects), true);
        $students = json_decode(json_encode($students), true);
        $schedules = json_decode(json_encode($schedules), true);
        $marks = json_decode(json_encode($marks), true);

        foreach ($students as $student)
        {
            foreach ($subjects as $subject)
            {
            
                foreach ($schedules as $schedule)
                {
                    if ($schedule['subject_id'] === $subject['subject_id'])
                    {
                        $mark = $request->get('mark_'.$schedule['id'].'_'.$student['id']);
                        if (!empty($mark) )
                        {
                            
                            $marks = new Mark(array(
                                        'exam_schedule_id' => $schedule['id'],
                                        'student_id' => $student['id'],
                                        'mark' => $mark,
                            ));
                            $marks->save();
                        }

                        foreach ($marks as $mark)
                        {
                            if (($schedule['id'] === $mark['sch_id']) && ($student['id'] === $mark['s_id']) )
                            {
                                $updated_mark = $request->get('mark_'.$schedule['id'].'_'.$student['id'].'_'.$mark['m_id']);
                                $mk = Mark::whereId($mark['m_id'])->firstOrFail();
                                $mk->mark = $updated_mark;
                                $mk->save();
                            }
                        }
                        
                    }
                }           
            }                                        
        }
        if (Auth::guard('teacher')->check()) $url = '/teacher/mark/create';
        else if (Auth::guard('admin')->check()) $url = '/admin/mark/create';
        return redirect($url)->with('status', 'Marks Updated');

    }
}
