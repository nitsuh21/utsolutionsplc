<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogsController extends Controller
{
    public function index(){
        $blogs = Blog::orderBy('id','desc')->latest()->take(6)->get();
        $blog = Blog::find(1);
        $populars = Blog::orderby('viewcount','desc')->take(5)->get();
        return view('Blogs',['blogs'=>$blogs,'populars'=>$populars]);
    }
    public function detailblog($id){
        $blog= Blog::find($id);
        $blogger=$blog->user()->first();
        $blog->viewcount = $blog->viewcount + 1;
        $related = Blog::query()
        ->where('id', '!=', $id)
        ->where('catagory', $blog->catagory)
        ->latest()->take(5)->get();
        $popular = Blog::orderby('viewcount','desc')->take(3)->get();
        return view('blogdetail',['blog'=>$blog,'popular'=>$popular,'blogger'=>$blogger,'related'=>$related]);
    }
}
