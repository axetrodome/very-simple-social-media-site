<div class="media">
  <img src="/storage/images/avatars/{{ profile_exists($post->user->image) }}" width="40" height="40" class="mr-3 rounded-circle" alt="avatar">
  <div class="media-body">
    <h5 class="mt-0"><a href="{{ route('profile.public',$post->user->slug) }}">{{ $post->user->name }}</a></h5>
    <small class="text-muted"> Posted <span class="fa fa-clock"></span> {{ $post->created_at->diffForHumans() }}</small>
    <div class="body">
      <a href="/post/{{ $post->slug }}">{{ $post->title }}
        @foreach($post->tags as $tag)
          <a href="#"><span class="badge badge-secondary">{{ $tag->title }}</span></a>
        @endforeach
      </a>
      @if(auth()->user()->email == $post->user->email)
        <a href="{{ route('post.edit',$post->slug) }}" class="float-right"><span class="fa fa-edit"></span> Edit</a>
      @endif
      <p>
        {{ str_limit(strip_tags($post->body), 300,'') }}
        @if (strlen(strip_tags($post->body)) > 300)
          <a href="/post/{{ $post->slug }}">Read More...</a>
        @endif  
      </p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="{{ route('post.like',$post->id) }}"><span class="fa fa-hand-point-up"></span> {{ (!$post->likes->count()) ? '' : $post->likes->count() }} Up</a></li>
        <li class="list-inline-item"><a href="#" class="comment_button"><span class="fa fa-bullhorn"></span> Comment</a></li>
        <li class="list-inline-item float-right"><a href="#"><span class="fa fa-share"></span>Share</a></li>
      </ul>
      <hr>
      @include('partials.comments')
    </div>
  </div>
</div>
