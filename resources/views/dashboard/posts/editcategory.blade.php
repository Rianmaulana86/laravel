@extends('layouts/main')

@section('container')
<form action="/editcategory/{{ $category->slug }}" method="post" enctype="multipart/form-data">
  @csrf
  <h1 class="mb-5">Halaman Update Category</h1>
  <div class="mb-3">
    <label for="title" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}" required>
    @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $category->slug) }}" required>
    @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Category Image</label>
    <img class="img-preview img-fluid mb-3 col-sm-5">
    <input type="hidden" name="oldimage" value="{{ $category->image }}">
    @if($category->image)
    <img src="{{ asset('storage/' . $category->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
  

  
  <a class="btn btn-success mt-3" href="/admin">Cancel</a>
  <button type="submit" class="btn btn-primary mt-3">Update</button>

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