@extends('layouts.main')

@section('container')

    <article class="mt-4">

        <!-- ini berfungsi buat special chars, jadi kalo ada text misal <p> didalam title, akan diabaikan / dianggap text biasa -->
        <h2>{{ $post->title }}</h2>

        <p>by <a href="/author/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/category/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
        <!-- sedangkan ini kebalikan dari atas, kalau ada <p> didalam textnya. akan dianggap sebagai tag html meskipun dia awalnya text biasa -->
        {!! $post->body !!}

    </article>

    <a href="/posts">Back</a>
@endsection
