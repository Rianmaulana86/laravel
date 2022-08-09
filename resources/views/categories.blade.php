
@extends('layouts/main')

@include('nav/navbar')
@section('container')

<h1 class="mt-3">Post {{ $title }}</h1>

<div class="container mt-5">
    <div class="row">
        @foreach ($categories as $cat)
        <div class="col-md-4">
            <div class="card text-bg-dark">
                <img src="/storage/{{ $cat->image }}" class="card-img" alt="{{ $cat->name }}">
                <div class="card-img-overlay d-flex align-items-center p-0">
                  <a href="/blog?category={{ $cat->slug }}" class="card-title text-center flex-fill  fs-3 text-decoration-none text-white"><h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.7)">{{ $cat->name }}</h5></a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
 

