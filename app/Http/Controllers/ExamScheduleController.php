<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\Subject;
Use App\TheClass;
Use App\ExamSchedule;
use Auth;
class ExamScheduleController extends Controller
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
    public function class_form()
    {
        $classes = $this->getClasses();
        $edit = array('editmode'=>'false');
        return view('examschedule.create', compact('classes', 'edit'));
    }

    public function schedule_form(Request $request)
    {
        $class_id = $request->get('class_id');
        $exam = $request->get('exam');

        // check if theres a schedule for form already
        $check = DB::select('SELECT id FROM exam_schedules WHERE exam = \''.$exam.'\' AND class_id ='.$class_id);
        //print_r($check);exit();
        if (count($check)>0)
        {
            // grab and display them for edit
            $schedules = DB::select('SELECT * FROM exam_schedules 
             WHERE exam = "'.$exam.'" AND class_id ='.$class_id);
        
            
        }

        // grab a list of all students assigned in this class
        $subjects = DB::select("SELECT s.id AS subject_id, s.name AS subject FROM assigns a INNER JOIN subjects s ON (s.id = a.subject_id) INNER JOIN the_classes c ON (c.id = a.class_id) WHERE c.id = ".$class_id);
        //print_r($subjects);exit();
        $clas = TheClass::whereId($class_id)->firstOrFail();
        $classes = $this->getClasses();
        $edit = array('editmode'=>'true');
        return view('examschedule.create', compact('classes', 'edit', 'clas', 'subjects', 'request', 'schedules'));
    }

    public function save_schedule(Request $request)
    {
        $exam = $request->get('exam');
        $submit = $request->get('submit');
        $class_id = $request->get('class_id');
        //exit($class_id);
        
        $subjects = DB::select("SELECT s.id AS subject_id, s.name AS subject FROM assigns a INNER JOIN subjects s ON (s.id = a.subject_id) INNER JOIN the_classes c ON (c.id = a.class_id) WHERE c.id = ".$class_id);
        
        $subjects = json_decode(json_encode($subjects), true);
        foreach ($subjects as $subject){
            

                $date = $request->get('date_'.$subject['subject_id']);
                $s_time = $request->get('start_time_'.$subject['subject_id']);
                $e_time = $request->get('end_time_'.$subject['subject_id']);

                //exit($request->get('start_time_'.$subject['subject_id']));
                // refuse to schedule for a subject whose date or time
                // was left empty
                if (!empty($date) && !empty($s_time) && !empty($e_time) )
                {
                    //exit('good');
                    $schedule = new ExamSchedule(array(
                        'exam' => $exam,
                        'subject_id' => $subject['subject_id'],
                        'class_id' => $request->get('class_id'),
                        'date' => date('Y-m-d',strtotime($date)),
                        'end_time' => $e_time,
                        'start_time' => $s_time,
                    ));
                    $schedule->save();
                }
        }
        if (Auth::guard('teacher')->check()) $url = '/teacher/examschedule/create';
        else if (Auth::guard('admin')->check()) $url = '/admin/examschedule/create';
        return redirect($url)->with('status', 'Exam Schedule saved');
    }

    public function update_schedule(Request $request)
    {
        $exam = $request->get('exam');
        $submit = $request->get('submit');
        $class_id = $request->get('class_id');
        
        $schedules = DB::select('SELECT * FROM exam_schedules WHERE exam = "'.$exam.'" AND class_id ='.$class_id);     
        $subjects = DB::select("SELECT s.id AS subject_id, s.name AS subject FROM assigns a INNER JOIN subjects s ON (s.id = a.subject_id) INNER JOIN the_classes c ON (c.id = a.class_id) WHERE c.id = ".$class_id);
        
        $subjects = json_decode(json_encode($subjects), true);
        $schedules = json_decode(json_encode($schedules), true);
        foreach ($subjects as $subject)
        {
                // we will save new subject schedules that were not
                // initially saved 
                $date = $request->get('date_'.$subject['subject_id']);
                $s_time = $request->get('start_time_'.$subject['subject_id']);
                $e_time = $request->get('end_time_'.$subject['subject_id']);

                // refuse to schedule for a subject whose date or time
                // was left empty
                if (!empty($date) && !empty($s_time) && !empty($e_time) )
                {
                    $schedule = new ExamSchedule(array(
                        'exam' => $exam,
                        'subject_id' => $subject['subject_id'],
                        'class_id' => $request->get('class_id'),
                        'date' => date('Y-m-d',strtotime($date)),
                        'end_time' => $e_time,
                        'start_time' => $s_time,
                    ));
                    $schedule->save();
                }

                // we will now update previously saved schedules
                foreach ($schedules as $schedule)
                {
                    if ($schedule['subject_id'] === $subject['subject_id'])
                    {
                        $date = $request->get('date_'.$subject['subject_id'].'_'.$schedule['id']);
                        $s_time = $request->get('start_time_'.$subject['subject_id'].'_'.$schedule['id']);
                        $e_time = $request->get('end_time_'.$subject['subject_id'].'_'.$schedule['id']);

                        $sc = ExamSchedule::whereId($schedule['id'])->firstOrFail();
                        $sc->exam = $request->get('exam');
                        $sc->subject_id = $subject['subject_id'];
                        $sc->class_id = $request->get('class_id');
                        $sc->date = date('Y-m-d',strtotime($date));
                        $sc->start_time = $s_time;
                        $sc->end_time = $e_time;
                        $sc->save();
                    }
                }                                                   
        }
        if (Auth::guard('teacher')->check()) $url = '/teacher/examschedule/create';
        else if (Auth::guard('admin')->check()) $url = '/admin/examschedule/create';
        return redirect($url)->with('status', 'Exam Schedule Updated');
    }

    public function show_schedule_form()
    {
        $classes = $this->getClasses();
        $edit = array('editmode'=>'false');
        return view('examschedule.index', compact('classes', 'edit'));

    }
    public function show_schedule(Request $request)
    {
        $class_id = $request->get('class_id');
        $classes = $this->getClasses();
        $clas = TheClass::whereId($class_id)->firstOrFail();
        $schedules = DB::select('SELECT id FROM exam_schedules WHERE class_id = '.$class_id);
        $CA1S = DB::select('SELECT s.name AS subject, e.date, start_time, end_time FROM exam_schedules e INNER JOIN subjects s ON (s.id = e.subject_id)  WHERE exam = "CA 1" AND class_id ='.$class_id);
        $CA2S = DB::select('SELECT s.name AS subject, e.date, start_time, end_time FROM exam_schedules e INNER JOIN subjects s ON (s.id = e.subject_id)  WHERE exam = "CA 2" AND class_id ='.$class_id);
        $EXAMS = DB::select('SELECT s.name AS subject, e.date, start_time, end_time FROM exam_schedules e INNER JOIN subjects s ON (s.id = e.subject_id)  WHERE exam = "EXAM" AND class_id ='.$class_id);
        
        $edit = array('editmode'=>'true');
        return view('examschedule.index', compact('classes', 'edit','clas', 'schedules', 'CA1S','CA2S','EXAMS'));

    }
}
