<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $posts = Post::where(function($query){
            $query->whereIn('user_id',auth()->user()->friends()->pluck('id'))
            ->orWhere('user_id',auth()->user()->id);
        })
        ->latest()
        ->get();


        $tags = Tag::all();

        return view('home',compact('posts','tags'));
    }
}
