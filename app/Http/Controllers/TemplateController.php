<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;

class TemplateController extends Controller
{
    public function index(){
        $news = News::latest()->take(3)->get();
        return view('home',['news'=>$news]);
    }
    public function about(){
        return view('about');
    }
}
