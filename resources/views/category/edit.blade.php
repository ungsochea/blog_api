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
<form action="{{ route('category.update',$category->id) }}" method="POST">
    @csrf
    @method('patch')
    <div class="form-group">
      <label for="exampleInputEmail1">Category name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $category->name }}" placeholder="Enter category name">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('category.index') }}" class="btn btn-warning">Back</a>
  </form>
@endsection