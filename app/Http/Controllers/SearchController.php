<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Blog;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');

        $results = News::query()
        ->where('Title', 'LIKE', "%{$search}%")
        ->orWhere('body', 'LIKE', "%{$search}%")
        ->get();
        $count = count($results);
        
        return view('searchresults', ['results'=>$results,'count'=>$count]);
    }

    public function index2(Request $request){
        $search = $request->input('search');

        $results = Blog::query()
        ->where('Title', 'LIKE', "%{$search}%")
        ->orWhere('body', 'LIKE', "%{$search}%")
        ->get();
        $count = count($results);
        
        return view('searchresultsb', ['results'=>$results,'count'=>$count,'search'=>$search]);
    }
}
