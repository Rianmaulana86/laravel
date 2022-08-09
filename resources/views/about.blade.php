@extends('layouts/main')
@include('nav/navbar')

@section('container')
<h1>Halaman about</h1>
<h3>{{ $name }}</h3>
<h3>{{ $email }}</h3>

<img src="{{ $image }}" alt="rian Maulana" width="200">

@endsection