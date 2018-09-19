<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\SchoolInformation;

class SchoolInformationController extends Controller
{

    public function index()
    {
        $info = DB::select('SELECT * FROM school_informations');
        //$info = json_decode(json_encode($info),true);
        //print_r($info);exit();
        if (count($info) !== 1)
        {
            // either no school information present OR
            // there are more than one field

            // we try to delete all fields
            SchoolInformation::truncate();
        }
        if (count($info)<1)
        {
            //return view('school.create');exit();
            return redirect(action('SchoolInformationController@create'))->with('status', 'School Information Successfully updated');
        }        
        return view('school.index')->with('info', json_encode($info,true));
    }
    public function create()
    {
        return view('school.create');
    }
    public function edit_form($id)
    {
        $info = DB::select('SELECT * FROM school_informations WHERE id='.$id);
        return view('school.edit')->with('info', json_encode($info,true));
    }
    public function save(Request $request)
    {
        $info = new SchoolInformation(array(
                'school_name' => $request->get('name'),
                'address' => $request->get('address'),
                'phone' => $request->get('phone'),
                'email' => $request->get('email'),
                'session' => $request->get('session'),
                'term' => $request->get('term'),
        ));
        $info->save();
        return redirect(action('SchoolInformationController@index'))->with('status', 'School Information Successfully updated');
    }
    public function update(Request $request, $id)
    {
        $info = SchoolInformation::whereId($id)->firstOrFail();
        $info->school_name = $request->get('name');
        $info->address = $request->get('address');
        $info->phone = $request->get('phone');
        $info->email = $request->get('email');
        $info->session = $request->get('session');
        $info->term = $request->get('term');
        $info->save();
        return redirect(action('SchoolInformationController@index'))->with('status', 'School Information Successfully updated');
    }
}
