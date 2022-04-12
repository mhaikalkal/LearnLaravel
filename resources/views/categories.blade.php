@extends('layouts.main')

@section('container')
    <h1 class="mt-4">Categories</h1>

    @foreach ($categories as $category)
    <ul class="mt-4 mb-4">
        <li>
            <a href="/category/{{ $category->slug }}" class="text-decoration-none">{{ $category->name }}</a>
        </li>
    </ul>
    @endforeach

@endsection
