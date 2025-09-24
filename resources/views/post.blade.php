@extends('layouts.main')

@section('content')
    <article>
        <div class="row d-flex justify-content-center">
            <div class="col-8">
                <h4>{!! $post->title !!}</h4>
                <h6><small>By. <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></small></h6>
                <div class="my-4">
                    @if ($post->image)
                        <img src="/storage/{{ $post->image }}" alt="image-thumbnail" width="100%" height="400px" style="object-fit: cover">
                    @else
                        <img src="/images/general-img-landscape.png" alt="image-thumbnail" width="100%" height="400px" style="object-fit: cover">
                    @endif
                </div>
                <p>{!! $post->body !!}</p>

                <a href="/blog" class="d-block mb-3">&laquo; Back to blog</a>
            </div>
        </div>
    </article>
@endsection