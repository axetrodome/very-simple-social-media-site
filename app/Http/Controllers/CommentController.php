<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function store(Post $post)
    {
    	$this->validate(request(),[
    		'body' => 'required|min:2'
    	]);

        $comment = new Comment;
        $comment->body = request('body');
        $comment->user()->associate(auth()->user());
        $post->comments()->save($comment);

        return back();
    }

    public function reply(Post $post,Comment $comment)
    {
        $this->validate(request(),[
            'body' => 'required|min:2'
        ]);

        $reply = new Comment;
        $reply->body = request('body');
        $reply->user()->associate(auth()->user());
        $reply->parent_id = $comment->id;
        
        $post->comments()->save($reply);

        return back();
    }

}
