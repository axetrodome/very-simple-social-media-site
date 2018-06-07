<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	}

	public function store()
	{
		$post = new Post;
		
		auth()->user()->publish(
			new Post([
				'title' => request('title'),
				'slug' => str_slug(request('title'),'-'),
				'body' => request('body')
			])
		);

        return back();
	}
	
	public function show(Post $post)
	{

        return view('posts.post',compact('post'));

	}

	public function edit(Post $post)
	{
        $tags = Tag::all();


		return view('posts.edit',compact('post','tags'));

	}

	public function update(Post $post)
	{


		$post->update([
			'title' => request('title'),	
			'slug' => str_slug(request('title'),'-'),
			'body' => request('body')	
		]);

        $post->tags()->sync(request('tags'));

        return redirect()->route('post.edit', [$post->slug])->with('success','Updated Successfuly');
	}
    
}
