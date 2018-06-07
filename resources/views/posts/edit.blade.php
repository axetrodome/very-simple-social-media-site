@extends('layouts.app')

@section('title','Edit | '.$post->title)

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.status')
            @include('layouts.errors')
            <form action="{{ route('post.update',$post->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control" placeholder="Some Badass rebellious title">
                </div>
                <div class="form-group">
                    <textarea type="text" 
                    name="body" 
                    id="body" 
                    class="form-control" 
                    placeholder="What's on your mind fagg!?">{{ $post->body }}</textarea>
                </div>
                <div class="form-group">
                    <select class="js-example-basic-multiple-edit form-control" multiple="multiple" name="tags[]">
                        @foreach($tags as $tag)
                          <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group float-right">
                    <button class="btn btn-sm btn-primary" type="submit">Save Changes</button>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>  
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".js-example-basic-multiple-edit").select2().val({{ $post->tags->pluck('id') }}).trigger('change');

    });
</script>
@endsection


