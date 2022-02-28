<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $news = News::orderBy('id','desc')->latest()->take(6)->get();
        $first = News::latest()->first();
        $latest = News::latest()->take(3)->get();
        $trending = News::latest()->take(3)->get();
        $popular = News::orderby('viewcount','desc')->take(3)->get();
        $entertainment = News::all()->where('catagory','entertainment');
        $tech = News::all()->where('catagory','tech');
        $ethiotech = News::all()->where('catagory','ethiotech');
        $science = News::all()->where('catagory','science');
        $utnews = News::all()->where('catagory','utnews');
        return view('News',['news'=>$news,'first'=>$first,
                            'latest'=>$latest,'trending'=>$trending,
                            'popular'=>$popular,'tech'=>$tech
                            ,'science'=>$science,'ethiotech'=>$ethiotech
                            ,'entertainment'=>$entertainment,'utnews'=>$utnews
    
          ]);
    }
    
    public function detailnews($id){
        $news= News::find($id);
        $news->viewcount = $news->viewcount + 1;
        $trending = News::latest()->take(3)->get();
        $news->save();
        $newsm = News::orderBy('id','desc')->get();
        $catagory = $news->catagory;
        $utnews = News::all()->where('catagory','utnews');
        $tech = News::all()->where('catagory','tech');
        $ethiotech = News::all()->where('catagory','ethiotech');
        $entertainment = News::all()->where('catagory','entertainment');
        $science = News::all()->where('catagory','science');
        $related = News::query()
        ->where('id', '!=', $id)
        ->where('catagory', $news->catagory)
        ->latest()->take(5)->get();
        $popular = News::orderby('viewcount','desc')->take(3)->get();
        return view('Newsdetail',['news'=>$news,'popular'=>$popular,
        'related'=>$related,'trending'=>$trending,'newsm'=>$newsm,
        'utnews'=>$utnews,'tech'=>$tech
        ,'science'=>$science,'ethiotech'=>$ethiotech,'entertainment'=>$entertainment]);
    }
}
