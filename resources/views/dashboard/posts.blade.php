@extends('dashboard.layouts.main')

@section('content')
<div
  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
  <h1 class="h2">My Posts</h1>
</div>

<a href="/dashboard/posts/create" class="btn btn-primary mb-2">Create post</a>

@if (session()->has('message'))
  <div class="row">
    <div class="col-4">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
  </div>
@endif

<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->category->name }}</td>
          <td>
            <a class="btn btn-primary btn-sm" href="/dashboard/posts/{{ $post->slug }}"><i class="bi bi-info-circle"></i></a>
            <a class="btn btn-warning btn-sm" href="/dashboard/posts/{{ $post->slug }}/edit"><i class="bi bi-pencil-square"></i></a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure want to delete this post?')"><i class="bi bi-trash-fill"></i></button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection