@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <h1>{{ $label }}</h1>
            </div>
            <div class="col-md-4 mt-4">
                <form action="/posts" method="get">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif

                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                        <button class="btn btn-danger" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- count() akan menjadi true kalau hasilnya > 0, dan false jika <= 0 -->
    @if ($posts->count())
        <div class="card mb-3 mt-4">
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
            <div class="card-body text-center">
                <h5 class="card-title">
                    <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
                </h5>
                <p>
                    <small class="text-muted">
                        by <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a class="btn btn-primary text-decoration-none" href="/post/{{ $posts[0]->slug }}">Read More</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <!-- Skip data pertama -->
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute px-3 py-1" style="background-color:rgba(0, 0, 0, 0.5); border-bottom-right-radius: 7px; font-size: 10pt;">
                                <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a>
                            </div>
                            <img src="https://source.unsplash.com/400x400?{{ $post->category->name }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="/post/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
                                </h5>
                                <small class="text-muted">
                                    by <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> - {{ $post->created_at->diffForHumans() }}
                                </small>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a class="btn btn-primary text-decoration-none" href="/post/{{ $post->slug }}">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4 ">No post found.</p>
    @endif


    <div class="d-flex justify-content-center">
        {{ $posts->links() }} <!-- Paginasi -->
    </div>


@endsection
