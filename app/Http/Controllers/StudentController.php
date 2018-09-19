<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\TheClass;
use App\Student;

class StudentController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function delete($id)
    {
        $student = Student::whereId($id)->firstOrFail();
        $student->delete();
        return redirect('/student/search')->with('status', 'Student has been deleted!');
    }
    public function index()
    {
        //$classes = TheClass::all();
        //$students = array();
        $classes = DB::select('select name from the_classes GROUP BY name');
        return view('student.index', compact('classes'));
        
    }
    public function search_info(Request $request){
        $classes = DB::select('select name from the_classes GROUP BY name');
        $sql = 'SELECT *, s.id AS stud_id FROM students s INNER JOIN the_classes c ON c.id = s.class_id WHERE MATCH (firstname,lastname,father_name,mother_name,guardian_name,admission_no)
                AGAINST (\''.$request->info.'\')';
        $students = DB::select($sql);
        return view('student.search', compact('classes','students'));
    }
    public function search(Request $request)
    {
        $classes = DB::select('select name from the_classes GROUP BY name');
        if ($request->section === 'All')
        {
            $sql = "SELECT  *, s.id AS stud_id FROM students s INNER JOIN the_classes c ON c.id = s.class_id WHERE c.name = '$request->class_id'";
        }
        else
        {
            $sql = "SELECT  *, s.id AS stud_id FROM students s INNER JOIN the_classes c ON c.id = s.class_id WHERE c.name = '$request->class_id' 
            AND c.section = '$request->section' ";
        }
        $students = DB::select($sql);
        return view('student.search', compact('classes','students'));
    }

    public function register_form()
    {
        $classes = TheClass::all();
        return view('student.register', compact('classes'));
    }
    public function register(Request $request)
    {
        $this->validate($request, [

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $image = $request->file('image');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/images');

        $image->move($destinationPath, $input['imagename']);

        $image_name = $input['imagename'];
       
        $student = new Student(array(
            'admission_no' => $request->get('admission_no'),
            'admission_date' => $request->get('admission_date'),
            'student_type' => $request->get('student_type'),
            'class_id' => $request->get('class_id'),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'image' => $image_name,
            'mobileno' => $request->get('mobileno'),
            'email' => $request->get('email'),
            'state' => $request->get('state'),
            'religion' => $request->get('religion'),
            'gender' => $request->get('gender'),
            'city' => $request->get('city'),
            'date_of_birth' => $request->get('date_of_birth'),
            'current_address' => $request->get('current_address'),
            'guardian_is' => $request->get('guardian_is'),
            'father_name' => $request->get('father_name'),
            'father_phone' => $request->get('father_phone'),
            'father_occupation' => $request->get('father_occupation'),
            'mother_name' => $request->get('mother_name'),
            'mother_phone' => $request->get('mother_phone'),
            'mother_occupation' => $request->get('mother_occupation'),
            'guardian_name' => $request->get('guardian_name'),
            'guardian_relation' => $request->get('guardian_relation'),
            'guardian_phone' => $request->get('guardian_phone'),
            'guardian_occupation' => $request->get('guardian_occupation'),
            'guardian_address' => $request->get('guardian_address'),
            'is_active' => $request->get('is_active')
        ));
        $student->save();
        return redirect('/student/register')->with('status', 'Student Successfully registered');
    }

    public function edit_form($id)
    {
        $student = Student::whereId($id)->firstOrFail();
        $classes = TheClass::all();
        return view('student.edit', compact('student','classes'));
    }
    public function update($id, Request $request)
    {
        
        // check if image isnt empty
        if (!empty($request->file('image'))){

            // validate image
            $this->validate($request, [

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);

            $image = $request->file('image');

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/images');

            $image->move($destinationPath, $input['imagename']);

            $image_name = $input['imagename'];

            
        }

        $student = Student::whereId($id)->firstOrFail();
        $student->admission_no = $request->get('admission_no');
        $student->admission_date = $request->get('admission_date');
        $student->student_type = $request->get('student_type');
        $student->class_id = $request->get('class_id');
        $student->firstname = $request->get('firstname');
        $student->lastname = $request->get('lastname');
        //$student->image = $request->get('image');
        $student->mobileno = $request->get('mobileno');
        $student->email = $request->get('email');
        if (!empty($image_name) && ($image_name!== NULL)) $student->image = $image_name;
        $student->state = $request->get('state');
        $student->religion = $request->get('religion');
        $student->gender = $request->get('gender');
        $student->city = $request->get('city');
        $student->date_of_birth = $request->get('date_of_birth');
        $student->current_address = $request->get('current_address');
        $student->guardian_is = $request->get('guardian_is');
        $student->father_name = $request->get('father_name');
        $student->father_phone = $request->get('father_phone');
        $student->father_occupation = $request->get('father_occupation');
        $student->mother_name = $request->get('mother_name');
        $student->mother_phone = $request->get('mother_phone');
        $student->mother_occupation = $request->get('mother_occupation');
        $student->guardian_name = $request->get('guardian_name');
        $student->guardian_relation = $request->get('guardian_relation');
        $student->guardian_phone = $request->get('guardian_phone');
        $student->guardian_occupation = $request->get('guardian_occupation');
        $student->guardian_address = $request->get('guardian_address');
        $student->is_active = $request->get('is_active');
        $student->save();
        return redirect(action('StudentController@edit_form', $id))->with('status', 'Student Record Successfully updated');
    }

    public function show($id)
    {
        $student = Student::whereId($id)->firstOrFail();
        $classes = TheClass::all();
        return view('student.profile', compact('student', 'classes'));
    }
}
