@extends('layouts/main')

@section('container')
<form action="/make" method="post" enctype="multipart/form-data">
  @csrf
  <h1 class="mb-5">Halaman Tambah Data</h1>
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" {{ old('title') }} required>
    @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="slug" class="form-label">Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" {{ old('slug') }} required>
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
      <option value="{{ $cat->id }}">{{ $cat->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Post Image</label>
    <img class="img-preview img-fluid mb-3 col-sm-5">
    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
    @error('image')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
  </div>
  <div class="mb-3">
    <label for="body" class="form-label">Body</label>
    <input id="body" type="hidden" name="body" {{ old('body') }}>
    <trix-editor input="body"></trix-editor>
    @error('body')
    <p class="text-danger">{{ $message }}</p>
    @enderror
  </div>
  

  
  <a class="btn btn-success mt-3" href="/dashboard">Cancel</a>
  <button type="submit" class="btn btn-primary mt-3">Submit</button>

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