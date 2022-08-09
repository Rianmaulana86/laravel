@extends('layouts/main')

@section('container')
<form action="/store" method="post" enctype="multipart/form-data">
  @csrf
  <h1 class="mb-5">Halaman Create Category</h1>
  <div class="mb-3">
    <label for="title" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" {{ old('name') }} required>
    @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" {{ old('slug') }} required>
    @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Category Image</label>
    <img class="img-preview img-fluid mb-3 col-sm-5">
    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
    @error('image')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
  </div>
  

  
  <a class="btn btn-success mt-3" href="/admin">Cancel</a>
  <button type="submit" class="btn btn-primary mt-3">Create</button>

</form>

<script>
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