<div class="post--comment-container">
    <label for="body">{{ str_plural('Comment',$post->comments->count()) }}: ({{ $post->comments->count() }})</label>
    @include('partials.comment')
    <form action="/comment/{{ $post->slug }}/reply" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="body" class="form-control form-control-sm" placeholder="Ofcourse its offensive im gonna rant too!" id="body"></textarea>
        </div>
        <div class="form-group float-right">
            <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-comment"></i> Comment</button>
        </div>
        <div class="clearfix"></div>
    </form>
</div>