@foreach($post->comments as $comment)
    <div class="container">
      @if(!$comment->parent_id)
        <div class="media">
          <img src="/storage/images/avatars/{{ profile_exists($comment->user->image) }}" width="40" height="40" class="mr-3 rounded-circle" alt="avatar">
          <div class="media-body">
            <h5 class="mt-0"><a href="{{ route('profile.public',$comment->user->slug) }}">{{ $comment->user->name }}</a></h5>
            <small class="text-muted"> Commented <span class="fa fa-clock"></span> {{ $comment->created_at->diffForHumans() }}</small>
              <p>
                {{ str_limit(strip_tags($comment->body), 300,'') }}
                @if (strlen(strip_tags($comment->body)) > 300)
                  <a href="#">See More...</a>
                @endif  
              </p>
            <ul class="list-inline comment">
              <li class="list-inline-item"><a href="/comment/{{ $comment->id }}/like"><span class="fa fa-hand-point-up"></span> {{ (!$comment->likes->count()) ? '' : $comment->likes->count() }} Up</a></li>
              <li class="list-inline-item"><a href="#"><span class="fa fa-reply"></span> Reply</a> - <a href="#">View 3 Replies</a> </li>
            </ul>
            @foreach($comment->replies as $reply)
              <div class="media mt-3">
                <img src="/storage/images/avatars/{{ profile_exists($reply->user->image) }}" width="40" height="40" class="mr-3 rounded-circle" alt="avatar">
                <div class="media-body">
                  <h5 class="mt-0"><a href="{{ route('profile.public',$reply->user->slug) }}">{{ $reply->user->name }}</a></h5>
                  <small class="text-muted"> Commented <span class="fa fa-clock"></span> {{ $reply->created_at->diffForHumans() }}</small>
                    <p>
                      {{ str_limit(strip_tags($reply->body), 300,'') }}
                      @if (strlen(strip_tags($reply->body)) > 300)
                        <a href="#">See More...</a>
                      @endif  
                    </p>
                    
                  <ul class="list-inline reply">
                    <li class="list-inline-item"><a href="/comment/{{ $reply->id }}/like"><span class="fa fa-hand-point-up"></span> {{ (!$reply->likes->count()) ? '' : $reply->likes->count() }} Up</a></li>
                    <li class="list-inline-item"><a href="#"><span class="fa fa-reply"></span> Reply</a> - <a href="#">View 3 Replies</a> </li>
                  </ul>
                  @foreach($reply->replies as $reply2)
                    <div class="media mt-3">
                      <img src="/storage/images/avatars/{{ profile_exists($reply2->user->image) }}" width="40" height="40" class="mr-3 rounded-circle" alt="avatar">
                      <div class="media-body">
                            <h5 class="mt-0"><a href="{{ route('profile.public',$reply2->user->slug) }}">{{ $reply2->user->name }}</a></h5>
                        <small class="text-muted"> Commented <span class="fa fa-clock"></span> {{ $reply2->created_at->diffForHumans() }}</small>
                          <p>
                            {{ str_limit(strip_tags($reply2->body), 300,'') }}
                            @if (strlen(strip_tags($reply2->body)) > 300)
                              <a href="#">See More...</a>
                            @endif  
                          </p>
                        <ul class="list-inline reply">
                          <li class="list-inline-item"><a href="/comment/{{ $reply2->id }}/like"><span class="fa fa-hand-point-up"></span> {{ (!$reply2->likes->count()) ? '' : $reply2->likes->count() }} Up</a></li>
                          <li class="list-inline-item"><a href="#"><span class="fa fa-reply"></span> Reply</a> - <a href="#">View 3 Replies</a> </li>
                        </ul>
                      </div>
                    </div>
                  @endforeach
                  <form action="/comment/{{ $post->slug }}/reply/{{ $reply->id }}" method="POST">
                      @csrf
                      <div class="form-group">
                          <textarea name="body" class="form-control form-control-sm" placeholder="Ofcourse its offensive im gonna rant too!" id="body"></textarea>
                      </div>
                      <div class="form-group float-right">
                          <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-reply"></i> Reply</button>
                      </div>
                      <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            @endforeach
              <form action="/comment/{{ $post->slug }}/reply/{{ $comment->id }}" method="POST">
                  @csrf
                  <div class="form-group">
                      <textarea name="body" class="form-control form-control-sm" placeholder="Ofcourse its offensive im gonna rant too!" id="body"></textarea>
                  </div>
                  <div class="form-group float-right">
                      <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-reply"></i> Reply</button>
                  </div>
                  <div class="clearfix"></div>
              </form>
          </div>
        </div>
      @endif
    </div>
@endforeach
