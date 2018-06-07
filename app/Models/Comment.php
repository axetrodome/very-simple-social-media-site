<?php

namespace App\Models;

class Comment extends Model
{
    //

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function posts()
	{
		return $this->belongsToMany(Post::class);
	}

	public function likes()
	{
		return $this->morphMany(Like::class,'likeable');
	}

	public function replies()
	{
		return $this->hasMany(Comment::class,'parent_id');
	}

	public function parent()
	{
		return $this->belongsTo(Comment::class,'parent_id');
	}

	public function commentable()
	{
		return $this->morphTo();
	}

}
