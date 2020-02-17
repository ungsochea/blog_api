@extends('layouts')
@section('content')
<h1 class="mt-4">Create Category</h1>
@if (Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{ Session::get('success') }} </strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (Session::get('failed'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>  {{ Session::get('failed') }} </strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
   
@endif
<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Blog Title</label>
      <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter blog title">
    </div>
    <div class="form-group">
        <label for="detail">Blog Details</label>
        <textarea id="editor1" name="detail" class="form-control" id="detail" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label for="category">Select Category</label>
        <select name="category" id="category" class="form-control">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="div">
        <label for=""> Selete featured photo </label>
        <input type="file" name="featurePhoto" class="form-control" onchange="loadPhoto(event)">
    </div>
    <div class="div">
        <img id="photo" height="100" width="100">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <script>
      function loadPhoto(event){
          var reader = new FileReader();
          reader.onload = function(){
              var output = document.getElementById('photo');
              output.scr = reader.result;
          };
          reader.readAsDataURL(event.target.files[0]);
      }
  </script>
@endsection