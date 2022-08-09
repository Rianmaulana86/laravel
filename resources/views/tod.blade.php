
@extends('layouts/main')



@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mt-3 mb-5">{{ $tod->title }}</h2>
            <p>By <a class="text-decoration-none" href="">{{ $tod->User->name }}</a> in <a class="text-decoration-none" href="/blog?category={{ $tod->category->slug }}">{{ $tod->category->name }}</a></p>
            <img src="{{ asset('storage/' . $tod->image) }}" class="img-fluid" alt=" {{ $tod->category->name }}">
            <p class="mt-3">{!! $tod->body !!}</p>
              <h2><a class="text-decoration-none mb-3 btn btn-success" href="/blog">Back to menu</a></h2>
        </div>
    </div>
</div>
@endsection