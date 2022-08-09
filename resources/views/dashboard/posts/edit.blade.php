@extends('layouts/main')

@section('container')
<form action="/update/{{ $post->slug }}" method="post" enctype="multipart/form-data">
  @csrf
  <h1 class="mb-5">{{ $title; }}</h1>
  <div class="mb-3">
    <label for="title"  class="form-label">Title</label>
    <input  type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" {{ old('title', $post->title) }} value="{{ $post->title }}" required>
    @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="slug" class="form-label">Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" {{ old('slug', $post->slug) }} value="{{ $post->slug }}" required>
    @error('slug')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror

  </div>
  <div class="mb-3">
    <label for="category_id" class="form-label">Category</label>

    <select class="form-select" aria-label="Default select example" name="category_id">
      @foreach($category as $cat)
      @if(old('category_id', $post->category_id) == $cat->id)
      <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
      @else
      <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endif
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Post Image</label>
    <input type="hidden" name="oldimage" value="{{ $post->image }}">
    @if($post->image)
    <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
    @else
    <img class="img-preview img-fluid mb-3 col-sm-5">
    @endif
    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
    @error('image')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
  </div>
  <div class="mb-3">
    <label for="body" class="form-label">Body</label>
    <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
    <trix-editor input="body"></trix-editor>
    @error('body')
    <p class="text-danger">{{ $message }}</p>
    @enderror
  </div>
  

  
  <a class="btn btn-success mt-3" href="/dashboard">Cancel</a>
  <button type="submit" class="btn btn-primary mt-3">Update Post</button>

</form>

<script>
    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    })
  
      function previewImage()
      {
        
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
  
  
    imgPreview.style.display = 'block';
  
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
  
    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
      }
  
  
  
  </script>
@endsection