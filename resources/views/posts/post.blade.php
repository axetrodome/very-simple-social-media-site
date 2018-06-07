@extends('layouts.app')

@section ('title',$post->title)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.status')

            @include('layouts.errors')
            
            <div class="post">
                <div class="">
                    <img src="/storage/images/avatars/{{ profile_exists($post->user->image) }}" width="40" height="40" alt="avatar" class="post--user-avatar">
                    <a href="{{ route('profile.public',$post->user->slug) }}">{{ $post->user->name }}</a>
                </div>
                <small class="text-muted"> Posted <span class="fa fa-clock"></span> {{ $post->created_at->diffForHumans() }}</small>
                <hr>
                <h3>{{ $post->title }}</h3>
                @foreach($post->tags as $tag)
                  <a href="#" class="badge badge-secondary">{{ $tag->title }}</a>
                @endforeach
                 <p class="">
                    {{ str_limit(strip_tags($post->body), 300,'') }}
                    @if (strlen(strip_tags($post->body)) > 300)
                      <a href="#">Read More...</a>
                    @endif
                </p>
                <ul class="list-inline">
                  <li class="list-inline-item"><a href="{{ route('post.like',$post->id) }}"><span class="fa fa-hand-point-up"></span> {{ (!$post->likes->count()) ? '' : $post->likes->count() }} Up</a></li>
                  <li class="list-inline-item"><span class="fa fa-bullhorn"></span> Comment</li>
                  <li class="list-inline-item float-right"><a href="#"><span class="fa fa-share"></span>Share</a></li>
                </ul>
              @include('partials.comments')
            </div>
        </div>
    </div>
</div>
@endsection
