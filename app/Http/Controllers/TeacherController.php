<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\Teacher;
Use App\Assign;
Use App\TheClass;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        $classes = TheClass::all();
        return view('teacher.index', compact('teachers', 'classes'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $image = $request->file('image');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/images');

        $image->move($destinationPath, $input['imagename']);

        $image_name = $input['imagename'];
        // $this->postImage->add($input);


        // return back()->with('success','Image Upload successful');
       
        $teacher = new Teacher(array(
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'address' => $request->get('address'),
            'class_id' => $request->get('class_id'),
            //'dob' => $request->get('dob'),
            //'designation' => $request->get('designation'),
            'photo' => $image_name,
            'sex' => $request->get('sex'),
            'phone' => $request->get('phone')
        ));
        $teacher->save();
        return redirect('/admin/teacher')->with('status', 'Teacher Successfully registered');
    }
    public function edit($id)
    {
        $teachers = Teacher::all();
        $teacher = Teacher::whereId($id)->firstOrFail();
        $classes = TheClass::all();
        //$class->delete();
        //return redirect('/admin/classes')->with('status', 'The class has been deleted!');
        $edit = array('editmode'=>'true');
        return view('teacher.index', compact('teachers', 'teacher', 'edit', 'classes'));
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
        
        $teacher = Teacher::whereId($id)->firstOrFail();
        $teacher->name = $request->get('name');
        $teacher->email = $request->get('email');
        $teacher->address = $request->get('address');
        //$teacher->dob = $request->get('dob');
        //$teacher->designation = $request->get('designation');
        $teacher->sex = $request->get('sex');
        if (!empty($request->file('image'))) $teacher->photo = $image_name;
        $teacher->phone = $request->get('phone');
        $teacher->save();
        return redirect(action('TeacherController@index'))->with('status', 'Teacher\'s Record Successfully updated');
    }

    public function delete($id)
    {
        $teacher = Teacher::whereId($id)->firstOrFail();
        $teacher->delete();
        return redirect('/admin/teacher')->with('status', 'Teacher has been deleted!');
    }

    public function show($id)
    {
        $sql = "SELECT CONCAT(c.name, ' ', c.section) AS class, s.name AS subject FROM assigns a INNER JOIN classes c 
        ON (c.id = a.class_id) INNER JOIN teachers t ON (t.id = a.teacher_id) INNER JOIN subjects s ON (s.id = a.subject_id) WHERE a.teacher_id = ".$id;
        $assigns = DB::select($sql);
        $teacher = Teacher::whereId($id)->firstOrFail();
        return view('teacher.profile', compact('teacher', 'assigns'));
    }
}
