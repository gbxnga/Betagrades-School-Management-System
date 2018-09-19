<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\Calendar;
Use App\News;

class CalendarController extends Controller
{
    
    public function index()
    {
        $events = Calendar::all();
        //$news = News::all()->orderBy('id','DESC');
        $news = News::orderBy('created_at','desc')->get();

        return view('calendar.index2', compact('events', 'news'));
    }

    public function addEvent(Request $request)
    {
        // Values received via ajax
        $title = $request->get('title');
        $url = $request->get('url');
        $end = date('Y-m-d',strtotime($request->get('daterange'))).' 12:00:00';
        $start = $end;

        $event = new Calendar(array(

                    'title' => $title,
                    'start' => $start,
                    'end' => $end,
                    'url' => $url,
        ));
        $event->save();
        return redirect(action('CalendarController@index'))->with('status', 'Event Successfully added');
    }

    public function addNews(Request $request)
    {

        $this->validate($request, [
            // bail stops validation check after title returns false
            'title' => 'bail|required',
            'news' => 'required',

        ]);
        // Values received via ajax
        $title = $request->get('title');
        $news = $request->get('news');

        

        $news = new News(array(

                    'title' => $title,
                    'news' => $news,
        ));
        $news->save();
        return redirect(action('CalendarController@index'))->with('status', 'News Successfully added');
    }

    public function updateEvent(Request $request)
    {
        // Values received via ajax
        $title = $request->get('title');
        $start = $request->get('start');
        $end = $request->get('end');
        $id = $request->get('id');

        $event = Calendar::whereId($id)->firstOrFail();
        $event->title = $title;
        $event->start = $start;
        $event->end = $end;
        $event->save();
    }
}
