@extends('layouts/main')

@section('container')

  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-5">{{ $post->title }}</h2>
            <p>By <a class="text-decoration-none" href="">{{ $post->User->name }}</a> in <a class="text-decoration-none" href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt=" {{ $post->category->name }}">
            <p class="mt-3">{!! $post->body !!}</p>
              <h2><a class="btn btn-success" href="/dashboard">Back to menu</a></h2>
        </div>
    </div>
</div>
@endsection
