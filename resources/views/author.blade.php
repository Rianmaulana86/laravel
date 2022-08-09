
 

@extends('layouts/main')

@section('container')

<h1 class="mb-5 mt-2 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/blog">
          @if (request('category'))
                <input type="hidden" name="category" value="{{ (request('category')) }}">
            @endif
            <div class="input-group mb-3 justify">
                <input type="text" value="{{ request('search') }}" class="form-control" placeholder="search..." name="search">
                <button class="btn btn-primary" type="submit" >search</button>
              </div>
        </form>
    </div>
</div>

@if ($post->count())
<div class="card mb-3">
    <img src="/image/{{ $post[0]->category->image }}" class="card-img-top" alt="...">
    <div class="card-body text-center">
      <h5 class="card-title">{{ $post[0]->title }}</h5>
      <p>
       <Small class="text-muted">
         By . <a class="text-decoration-none" href="/authors/{{ $post[0]->user->username}}">{{ $post[0]->user->name }}</a> in <a class="text-decoration-none" href="/post?category={{ $post[0]->category->slug }}">{{ $post[0]->category->name }}</a> {{ $post[0]->created_at->diFfForHumans() }}
        </Small> 
    </p>
        <p class="card-text">{{ $post[0]->excerpt }}</p>
        <a class="text-decoration-none btn btn-primary" href="/tod/{{ $post[0]->slug }}">Read More</a>
    </div>
  </div>  
    @else
    <p class="text-center fs-4">no post found</p>
@endif

<div class="container">
    <div class="row">
        @foreach ($post->skip(1) as $pos)
        <div class="col md-4">
            <div class="card" style="width: 18rem;">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a class="text-decoration-none text-white" href="/post?category={{ $pos->category->slug }}">{{ $pos->category->name }}</a></div>
                <img src="/image/{{ $pos->category->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                <h2><a class="text-decoration-none" href="/tod/{{ $pos->slug }}">{{ $pos->title }}</a></h2>
                  <p>Author : <a class="text-decoration-none" href="/authors/{{ $pos->user->username}}">{{ $pos->user->name }}</a></p>
                  <p>{!! $pos->excerpt !!}</p>
                  <a href="/tod/{{ $pos->slug }}" class="btn btn-primary">read more</a>
                </div>
              </div>
             
        </div>
        
        @endforeach
       
    </div>
</div>
@endsection
 

 

