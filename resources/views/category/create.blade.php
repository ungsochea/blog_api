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
<form action="post-category-form" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Category name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection