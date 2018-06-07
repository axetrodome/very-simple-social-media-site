<?php

namespace App\Models;


class Like extends Model
{
    //

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function posts()
	{
		return $this->belongsTo(Post::class);
	}

    public function likeable()
    {
    	return $this->morphTo();
    }
}
