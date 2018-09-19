<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\TheClass;

class TheClassController extends Controller
{
    public function index()
    {
        //$classes = DB::select('select name from the_classes GROUP BY name');
        $classes = TheClass::all();
        return view('class.index', compact('classes'));
    }

    public function create(Request $request)
    {
        $class = new TheClass(array(
            'name' => $request->get('name'),
            'section' => $request->get('section')
        ));
        $class->save();
        //$classes = TheClass::all();
        return redirect('/admin/classes')->with('status', 'Class successfully created');

    }
    public function delete($id)
    {
        $class = TheClass::whereId($id)->firstOrFail();
        $class->delete();
        return redirect('/admin/classes')->with('status', 'The class has been deleted!');
    }

    public function edit($id)
    {
        $classes = TheClass::all();
        $class = TheClass::whereId($id)->firstOrFail();
        //$class->delete();
        //return redirect('/admin/classes')->with('status', 'The class has been deleted!');
        $edit = array('editmode'=>'true');
        return view('class.index', compact('classes', 'class', 'edit'));
    }

    public function update(Request $request, $id)
    {        
        $class = TheClass::whereId($id)->firstOrFail();
        $class->name = $request->get('name');
        $class->section = $request->get('section');
        $class->save();
        return redirect(action('TheClassController@index'))->with('status', 'Class details Successfully updated');
    }
}

