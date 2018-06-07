<form action="/post/create" method="POST">
    @csrf
    <div class="form-group">
        <input type="text" name="title" id="title" class="form-control" placeholder="Some Badass rebellious title">
    </div>
    <div class="form-group">
        <textarea type="text" 
        name="body" 
        id="body" 
        class="form-control" 
        placeholder="What's on your mind fagg!?"></textarea>
    </div>
    
    <div class="form-group">
        <select class="js-example-basic-multiple form-control" multiple="multiple" name="tags[]">
            @foreach($tags as $tag)
              <option value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group float-right">
        <button class="btn btn-sm btn-primary" type="submit">Post</button>
    </div>
    <div class="clearfix"></div>
</form>