<?php

namespace App\Traits;

use App\Models\Post;

trait CreatePosts
{
	public function posts()
	{
	    return $this->hasMany(Post::class);
	}

	public function write(Post $post)
	{
		
        $this->posts()->save($post);
        $post->tags()->sync(request('tags'));

	}

}