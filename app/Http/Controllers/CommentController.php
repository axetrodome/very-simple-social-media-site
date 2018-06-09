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

        me()->addComment($post,request('body'));

        return back();
    }

    public function reply(Post $post,Comment $comment)
    {
        $this->validate(request(),[
            'body' => 'required|min:2'
        ]);

        me()->addReply($post,$comment,request('body'));

        return back();
    }

}
