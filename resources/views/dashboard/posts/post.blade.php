
@extends('layouts/dashboardmain')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">selamat datang {{ auth()->user()->name }}</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
  </div>
</div>

    <a class="btn btn-primary mb-3" href="/create">Tambah Data</a>

      @if(session()->has('succes'))
      <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        {{ session('succes') }}
        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      @endif

    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Judul</th>
            <th scope="col">Kategory</th>
            <th class="text-center" scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($post as $pos)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pos->title }}</td>
            <td>{{ $pos->category->name }}</td>
            <td class="text-center">
                <a href="/show/{{ $pos->slug }}" class="btn btn-success">lihat</a>
                <a href="/edit/{{ $pos->slug }}" class="btn btn-primary">edit</a>
                <form action="/delete/{{ $pos->slug }}" method="post" class="d-inline">
                  @csrf
               <button class="btn btn-danger border-0" type="submit" onclick="return confirm('are u sure abaout this?')">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

@endsection