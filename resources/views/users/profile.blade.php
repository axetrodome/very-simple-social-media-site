@extends('layouts.app')

@section ('title','Profile | '.$user->name)

@section('content')
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">{{ $user->name }}'s Profile</div>
	                <div class="card-body">
						@include('layouts.status')
						
						@include('layouts.errors')
						<div class="row">
							<div class="col-md-6">
								<img src="/storage/images/avatars/{{ profile_exists($user->image) }}" width="200" height="200" alt="avatar" class="rounded">
							</div>
		

							<div class="col-md-6">
								<div class="user-profile-description text-muted">
									<h3>{{ $user->name }}</h3>
									<hr>
									@foreach($posts as $post)
									<?php 
										$total[] = $post->likes->count()
									?>	
									@endforeach
									<h4>{{ $user->email }}</h4>
									<p><b>{{ str_plural('Comment',$user->comments->count()) }}:</b> {{ $user->comments->count() }} | <b>Posts: </b>{{ $user->posts->count() }} | <b>Up: </b>{{ array_sum($total) }}</p> 
									<b>{{ str_plural('Hater',$user->friends->count()) }}: <span class="badge badge-primary">{{ $user->friends->count() }}</span></b>
									@if($user->friends->count())
										@foreach($user->friends as $friend)
											<ul>
												<li>{{ $friend->name }}</li>
											</ul>
										@endforeach
									@else
										<p>Haven't hate anyone yet.</p>
									@endif

									@if(auth()->user()->id == $user->id)
										<b>{{ str_plural('Waiting',$user->friendRequests->count()) }}: <span class="badge badge-danger">{{ $user->friendRequests->count() }}</span></b>
										@if($user->friendRequests->count())
											@foreach($user->friendRequests as $friend_request)
												<ul>
													<li>
														<form action="/profile/{{ $friend_request->slug }}/accept" method="POST">
															@csrf
															{{ $friend_request->name }}
															<button type="submit" class="btn btn-sm btn-info">Confirm</button>
														</form>
													</li>
												</ul>
											@endforeach
										@else
											<p>No Chasers yet.</p>
										@endif
									@endif
									
									@if(auth()->user()->email != $user->email)
										@if(auth()->user()->hasFriendRequestPending($user)) {{-- i add the user --}}
											<p>Pending hate Request</p>
										@elseif(auth()->user()->hasFriendRequestRecieved($user)) {{-- users add me --}}
											<form action="/profile/{{ $user->slug }}/accept" method="POST">
												@csrf
												<div class="form-group float-right">
													<button type="submit" class="btn btn-sm btn-info"><span class="oi oi-plus"></span> Accept !</button>	
												</div>
											</form>
										@elseif(auth()->user()->isFriendsWith($user))
											<p>You and {{ $user->name }} are rivals.</p>
										@else
											<form action="/profile/{{ $user->slug }}/add" method="POST">
												@csrf
												<div class="form-group float-right">
													<button type="submit" class="btn btn-sm btn-danger"><span class="oi oi-plus"></span> Challenge</button>	
												</div>
											</form>
										@endif
									@endif
								</div>
							</div>
						</div>
						<hr>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection