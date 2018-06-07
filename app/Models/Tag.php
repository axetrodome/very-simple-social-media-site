<?php

namespace App\Models;


class Tag extends Model
{
    //
    public $timestamps = false;

    public function posts()
    {
    	return $this->belongsToMany(Post::class);
    }
}
