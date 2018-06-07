<?php


namespace App\Models;


class Post extends Model
{
    //
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    
    public function likes()
    {
    	return $this->morphMany(Like::class,'likeable');
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }

}
