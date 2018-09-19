<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\TheClass;
use App\Student;
use App\Mark;
use App\AcademicGrade;
use App\NonAcademicGrade;
use Auth;

class GradeReportController extends Controller
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

    public function index ()
    {
        $classes = $this->getClasses();
        return view('gradereport.index', compact('classes'));
    }
    public function showStudentList(Request $request)
    {
        $class_id = $request->get('class_id');
        $students = DB::select('SELECT * FROM students WHERE class_id='.$request->class_id);
        if (count($students)<1) 
        {
            return redirect(action('GradeReportController@index'))->with('status', 'There are no students in this class');
            exit();
        }
        $reports = DB::select('SELECT s.admission_no, CONCAT(s.firstname, \' \', s.lastname) AS student, s.image, s.id  FROM academic_grades INNER JOIN students s ON s.id = academic_grades.student_id 
                    INNER JOIN subjects sub ON (sub.id = academic_grades.subject_id) WHERE s.class_id = '.$class_id.' ');
                    //print_r($reports);exit();
        $clas = TheClass::whereId($class_id)->firstOrFail();

        return view('gradereport.list', compact('students', 'reports', 'clas'));
    }

    public function showStudentReportForm ($id)
    {
        $sql = 'SELECT std.id AS STUDENT_ID, sub.id AS SUBJECT_ID, sub.name AS SUBJECT, std.firstname AS STUDENT_NAME, es.exam, m.mark AS SCORE
                FROM marks m
                JOIN exam_schedules es ON ( es.id = m.exam_schedule_id )
                JOIN subjects sub ON ( sub.id = es.subject_id )
                JOIN students std ON (std.id = m.student_id)
                WHERE  std.id= '.$id.' ORDER BY es.exam ASC';
        $marks = DB::select($sql);
        $student = Student::whereId($id)->firstOrFail();

        // grab a list of all students assigned in this class
        $subjects = DB::select("SELECT s.id AS subject_id, s.name AS subject FROM assigns a INNER JOIN subjects s ON (s.id = a.subject_id) INNER JOIN the_classes c ON (c.id = a.class_id) WHERE c.id = ".$student->class_id);
        //print_r($subjects);exit();     
        return view('gradereport.report', compact('marks', 'subjects', 'student'));
        
    }
    public function generateReportForm(Request $request, $id)
    {
        $student = Student::whereId($id)->firstOrFail();
        // grab a list of all students assigned in this class
        $subjects = DB::select("SELECT s.id AS subject_id, s.name AS subject FROM assigns a INNER JOIN subjects s ON (s.id = a.subject_id) INNER JOIN the_classes c ON (c.id = a.class_id) WHERE c.id = ".$student->class_id);        
        $subjects = json_decode(json_encode($subjects), true);

        foreach ($subjects as $subject)
        {
            $ca1 = $request->get(''.$subject['subject_id'].'_'.'CA1');
            $ca2 = $request->get(''.$subject['subject_id'].'_'.'CA2');
            $exam = $request->get(''.$subject['subject_id'].'_'.'EXAM');
            //$total = $request->get(''.$subject['subject_id'].'_'.'TOTAL');

                                        
            $report = new AcademicGrade(array(

                        'student_id' => $request->get('student_id'),
                        'subject_id' => $subject['subject_id'],
                        'CA 1' => $ca1,
                        'CA 2' => $ca2,
                        'EXAM' => $exam,
                        'TOTAL' => $ca1 + $ca2 + $exam,
            ));
            $report->save();
        }

        $n_report = new NonAcademicGrade(array(

                    'student_id' => $request->get('student_id'),
                    'attentiveness' => $request->get('attentiveness'),
                    'punctuality' => $request->get('punctuality'),
                    'leadership' => $request->get('leadership'),
                    'class_teacher_remark' => $request->get('class_teacher_remark'),
                    'house_master_remark' => $request->get('house_master_remark'),
        ));
        $n_report->save();

    }

    public function viewStudentReportForm()
    {
        // pdf
        
    }
}
