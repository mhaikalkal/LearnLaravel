@extends('layouts.main')

@section('container')

    <h1 class="mt-4 mb-4">{{ $label }}</h1>
    @foreach ($posts as $post)
    <article  class="mt-4 mb-4 border-bottom">
        <h2>
            <a href="/post/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
        </h2>

        <p>by <a href="/author/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/category/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
        <p>{{ $post->excerpt }} <a href="/post/{{ $post->slug }}" class="text-decoration-none">Read more..</a></p>
    </article>
    @endforeach

@endsection
