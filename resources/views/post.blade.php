@extends('layouts.main')

@section('container')
    <div class="container mt-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">

                <!-- ini berfungsi buat special chars, jadi kalo ada text misal <p> didalam title, akan diabaikan / dianggap text biasa -->
                <h2>{{ $post->title }}</h2>
                <p>by <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
                <!-- sedangkan ini kebalikan dari atas, kalau ada <p> didalam textnya. akan dianggap sebagai tag html meskipun dia awalnya text biasa -->

                @if ($post->image)
                    <div style="max-height: 400px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-3" alt="...">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top mt-3" alt="...">
                @endif

                <article class="fs-5 mt-2">
                    {!! $post->body !!}
                    <a href="/posts">Back</a>
                </article>

            </div>
        </div>
    </div>


@endsection
