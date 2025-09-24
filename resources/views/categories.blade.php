@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Post Categories</h1>

    <div class="row d-flex justify-content-center">
        @foreach ($categories as $category)
            <div class="col-12 col-sm-3 d-flex justify-content-center g-4">
                <a href="/blog?category={{ $category['slug'] }}" class="position-relative" style="width: 15rem">
                    <img src="/images/illustration-gallery-icon.jpg" class="img-thumbnail" alt="category-item">
                    <div class="position-absolute top-50 start-50 translate-middle w-100 text-center py-2" style="background-color: rgba(0, 0, 0, .7)">
                        <p class="m-0 text-white">{{ $category->name }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection