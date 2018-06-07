<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //

    public function like_comment($id)
    {
    	$comment = Comment::find($id);
    	
    	$like = new Like;

    	$like->user()->associate(auth()->user());
    	$comment->likes()->save($like);

    	return back();
    	
    }

    public function like_post($id)
    {

    	$post = Post::find($id);

    	$like = new Like;

    	$like->user()->associate(auth()->user());
    	$post->likes()->save($like);
    	
    	return back();
    }

    public function unlike_post()
    {

    }

    public function unlike_comment()
    {

    }

}
