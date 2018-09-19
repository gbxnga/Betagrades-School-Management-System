<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\News;

class NewsController extends Controller
{
    public function view($id){
        $news = News::all();
        $new = News::whereId($id)->firstOrFail();
        return view('news.index', compact('new', 'news'));
    }

    public function delete($id){
        $new = News::whereId($id)->firstOrFail();
        $new->delete();
        return redirect('/admin/home')->with('status', 'News has been deleted!');
    
    }
}
