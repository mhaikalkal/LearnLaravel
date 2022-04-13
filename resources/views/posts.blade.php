@extends('layouts.main')

@section('container')

    <h1 class="mt-4 mb-4">{{ $label }}</h1>

    <!-- count() akan menjadi true kalau hasilnya > 0, dan false jika <= 0 -->
    @if ($posts->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
            <div class="card-body text-center">
                <h5 class="card-title">
                    <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
                </h5>
                <p>
                    <small class="text-muted">
                        by <a href="/author/{{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/category/{{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> - {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a class="btn btn-primary text-decoration-none" href="/post/{{ $posts[0]->slug }}">Read More</a>
            </div>
        </div>
    @else
        <p class="text-center fs-4 ">No post found.</p>
    @endif

    <div class="container">
        <div class="row">
            <!-- Skip data pertama -->
            @foreach ($posts->skip(1) as $post)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute px-3 py-1" style="background-color:rgba(0, 0, 0, 0.5); border-bottom-right-radius: 10px; font-size: 10pt;">
                        <a href="/category/{{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a>
                    </div>
                    <img src="https://source.unsplash.com/500x350?{{ $post->category->name }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/post/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
                        </h5>
                        <small class="text-muted">
                            by <a href="/author/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> - {{ $post->created_at->diffForHumans() }}
                        </small>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a class="btn btn-primary text-decoration-none" href="/post/{{ $post->slug }}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
