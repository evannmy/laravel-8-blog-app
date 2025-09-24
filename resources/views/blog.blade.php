@extends('layouts.main')

@section('content')
    <h1 class="mb-3 text-center">{{ $heading }}</h1>

    <div class="row justify-content-center mb-3">
        <form action="/blog" method="GET" class="col-6">
            <div class="input-group mb-3">
                @if ($category)
                    <input type="hidden" name="category" value="{{ $category }}">
                @endif
                @if ($author)
                    <input type="hidden" name="author" value="{{ $author }}">
                @endif
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ $search ?? '' }}">
                <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>
    </div>

    @if ($posts->count() > 0)
        <article>
            <div class="card mb-3 text-center">
                @if ($posts[0]->image)
                    <img src="/storage/{{ $posts[0]->image }}" class="card-img-top" alt="image-thumbnail" height="350px" style="object-fit: cover">
                @else
                    <img src="/images/general-img-landscape.png" class="card-img-top" alt="image-thumbnail" height="350px" style="object-fit: cover">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $posts[0]->title }}</h5>
                    <p class="card-text"><small class="text-body-secondary">By. <a href="/blog?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in <a href="/blog?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}</small></p>
                    <p class="card-text">{{ $posts[0]->excerpt }}</p>
                    <a href="/posts/{{ $posts[0]['slug'] }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </article>

        <div class="row">
        @foreach ($posts->skip(1) as $post)
            <div class="col d-flex justify-content-center mb-3">
                <div class="card" style="width: 18rem; height: fit-content">
                    <div class="position-absolute text-white px-3 py-1" style="background-color: rgba(0, 0, 0, .7); border-bottom-right-radius: 0.3em;">
                        <p class="m-0">{{ $post->category->name }}</p>
                    </div>
                    @if ($post->image)
                        <img src="/storage/{{ $post->image }}" class="card-img-top" alt="image-thumbnail" height="200px" style="object-fit: cover">
                    @else   
                        <img src="/images/illustration-gallery-icon.jpg" class="card-img-top" alt="image-thumbnail" height="200px" style="object-fit: cover">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text"><small>By. <a href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}</small></p>
                        <p class="card-text">{!! $post->excerpt !!}</p>
                        <a href="/posts/{{ $post['slug'] }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>

            {{-- <article class="mb-3">
                <h4><a href="/posts/{{ $post['slug'] }}">{{ $post->title }}</a></h4>
                <h6>By. <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></h6>
                <p>{!! $post->excerpt !!}</p>
            </article> --}}
        @endforeach
        </div>

    @else
        <h5 class="text-center">--- Post not found ---</h5>
    @endif

    <div class="mt-4 d-flex justify-content-end">
        {{ $posts->links() }}
    </div>
        
@endsection