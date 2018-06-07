@extends('layouts.app')

@section('title','Search People | '.app('request')->input('query'))

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.status')
            @include('layouts.errors')
            <h3>You searched for "{{ app('request')->input('query')  }}"</h3>
            <h5>Results: </h5>
            @foreach($users as $user)
            <div class="media">
              <img src="/storage/images/avatars/{{ profile_exists($user->image) }}" width="40" height="40" class="mr-3 rounded" alt="avatar">
              <div class="media-body">
              	<h5 class="mt-0"><a href="{{ route('profile.public',$user->slug) }}">{{ $user->name }}</a></h5>
              	<small>{{ $user->email }}</small>
              </div>
            </div>
            @if(!$loop->last)
		        <hr>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
