
@extends('layouts/main')
@include('nav/navbar')

@section('container')

<h1 class="mb-5" >Post Category : {{ $title }}</h1>
@foreach ($post as $pos)
<div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a class="text-decoration-none text-white" href="/category/{{ $pos->category->slug }}">{{ $pos->category->name }}</a></div>
<img src="{{ $pos->category->image }}" class="card-img-top" alt="...">

<article class="border-bottom mb-3">
<h2><a class="text-decoration-none" href="/tod/{{ $pos["slug"] }}">{{ $pos["title"] }}</a></h2>
<p>{!! $pos->excerpt !!}</p>
</article>
</div>
@endforeach
@endsection
 

