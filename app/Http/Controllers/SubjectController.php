<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\Subject;

class SubjectController extends Controller
{
 
    public function index()
    {
        $subjects = Subject::all();
        return view('subject.index', compact('subjects'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',

        ]);
        $subject = new Subject(array(
            'name' => $request->get('name'),
            'type' => $request->get('type')
        ));
        $subject->save();
        //$subjectes = Subject::all();
        return redirect('/admin/subject')->with('status', 'subject successfully created');

    }
    public function delete($id)
    {
        $subject = Subject::whereId($id)->firstOrFail();
        $subject->delete();
        return redirect('/admin/subject')->with('status', 'The subject has been deleted!');
    }

    public function edit($id)
    {
        $subjects = Subject::all();
        $subject = Subject::whereId($id)->firstOrFail();
        //$subject->delete();
        //return redirect('/admin/subjectes')->with('status', 'The subject has been deleted!');
        $edit = array('editmode'=>'true');
        return view('subject.index', compact('subjects', 'subject', 'edit'));
    }

    public function update(Request $request, $id)
    {        
        $subject = Subject::whereId($id)->firstOrFail();
        $subject->name = $request->get('name');
        $subject->type = $request->get('type');
        $subject->save();
        return redirect(action('SubjectController@index'))->with('status', 'Subject details Successfully updated');
    }
}
