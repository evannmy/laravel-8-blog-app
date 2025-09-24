@extends('dashboard.layouts.main')

@section('content')
  <article>
        <div class="row">
            <div class="col-8">
                <h3 class="mt-3">{!! $post->title !!}</h3>
                <div class="action">
                  <a class="btn btn-primary btn-sm" href="/dashboard/posts"><i class="bi bi-arrow-left"></i> Back</a>
                  <a class="btn btn-warning btn-sm" href="/dashboard/posts/{{ $post->slug }}/edit"><i class="bi bi-pencil-square"></i> Edit</a>
                  <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure want to delete this post?')"><i class="bi bi-trash-fill"></i> Delete</button>
                  </form>
                </div>
                <div class="my-4">
                    @if ($post->image)
                        <img src="/storage/{{ $post->image }}" alt="image-thumbnail" width="100%" height="400px" style="object-fit: cover">
                    @else
                        <img src="/images/general-img-landscape.png" alt="image-thumbnail" width="100%" height="400px" style="object-fit: cover">
                    @endif
                </div>
                <p>{!! $post->body !!}</p>
            </div>
        </div>
    </article>
@endsection