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
<div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Detail</th>
                        <th>Image</th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{!! $post->detail !!}</td>
                        <td>
                            <img src="{{ asset($post->featured_image_url) }}" alt="" height="100" width="100">
                        </td>
                        <td>
                            <a href="{{ route('post.edit',$post->id)}}" class="btn btn-outline-primary btn-sm">Edit</a>
                            <a href="{{ route('post.destroy',$post->id)}}" class="btn btn-outline-danger btn-sm" onclick="checkDelete()">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function checkDelete(){
        var check = confirm('Are you sure you want to delete this ? ');
        if(check){
            return true;
        }
        return false;
    }
</script>
@endsection