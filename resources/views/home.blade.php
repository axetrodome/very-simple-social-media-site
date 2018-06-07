@extends('layouts.app')

@section('title',config('app.name').' | Home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.status')
            @include('layouts.errors')
            
            @include('partials.form')
            <hr>
            @foreach($posts as $post)
                @include('partials.posts')
            @endforeach
        </div>
    </div>
</div>
@endsection
