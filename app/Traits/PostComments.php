<?php

namespace App\Traits;

use App\Models\Post;
use App\Models\Comment;

trait PostComments
{
	public function comments()
	{
	    return $this->hasMany(Comment::class);
	}

	public function addComment(Post $post,$body)
	{
		$comment = new Comment;

		$comment->body = $body;
		
		$comment->user()->associate(me());
		$post->comments()->save($comment);
	}

	public function addReply(Post $post,Comment $comment,$body)
	{
		$reply = new Comment;
		
		$reply->body = $body;
		$reply->user()->associate(me());

		$reply->parent_id = $comment->id;
		
		$post->comments()->save($reply);
	}

}