@extends('layouts.app')
{{-- 
the goal is
	started in May 28, 2018 8:22 PM
	
	done()->slug
	done()->update users data
	done()->update profile picture with preview
	done()->clean validation
	done()->add middleware
	done()->change password Saturday June 2, 2018 12:34 AM
	done()->add posts  Saturday June 2, 2018 2:46 PM
	done()->add tags to post Saturday June 2, 2018 8:37PM
	done()->add slugs in posts Sunday June 3, 2018 12:25AM
	done()->add comments Sunday June 3, 2018 1:24 AM
	done()->add friends Tuesday June 5, 2018 1:28 AM
	done()->model structure
	done()->make posts available to only friends Wednesday June 6, 2018
	done()->add to search people Wednesday June 6, 2018 6:53 PM
	done()->add likes in comments and posts
	done()->add edit in posts Thursday June 7, 2018 2:42 AM
	done()->add multi-level-comments Friday June 8, 2018 2:05 AM
	done()->refactor comments and make it polymorphic Friday June 8, 2018 2:05 AM
	done()->add dynamic title Friday June 8, 2018 2:32 AM

	-refactor comment bladeview
	-add sort by most up posts
	-add validations in likes
	-add to search posts,tags
	-add see more in comments
	-add-image-in-posts
	-view-more in comments
	-add chats
	-add roles to users
	-add groups for users
	-add page for creating tags

 --}}
@section ('title','Edit')

@section('content')
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">Profile</div>
	                <div class="card-body">
						@include('layouts.status')
						
						@include('layouts.errors')
	                	<form action="/profile/{{ $user->slug }}/update" enctype="multipart/form-data" method="POST">
							@csrf
							@method('PUT')
								<img src="/storage/images/avatars/{{ profile_exists($user->image) }}" width="200" height="200" alt="avatar" class="avatar">
								<div class="form-group float-right">
									<label for="image"><b>Avatar:</b></label>
									<input type="file" name="image" id="image" class="form-control">
								</div>
							<hr>
						     <div class="form-group">
						     	<label for="name"><b>Name:</b></label>
						     	<input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
						     </div>
						     <div class="form-group">
						     	<label for="email"><b>Email:</b></label>
						     	<input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
						     </div>           		
							<div class="form-group float-right">
								<button type="submit" class="btn btn-sm btn-primary"><span class="fa fa-arrow-down"></span> Save</button>
							</div>
	                	</form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection