@extends('dashboard.layouts.main')

@section('container')
<div class="container mt-4">
    <div class="row my-3">
        <div class="col-lg-10">
            <h2>{{ $post->title }}</h2>

            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                {{-- karena mau delete dan ada csrf token-nya, maka kita override methodnya biar jadi delete --}}
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0" id="delete" onclick="return confirm('Are you sure?')">
                    <span data-feather="trash"></span> Delete
                </button>
            </form>
            @if ($post->image)
            <div style="max-height: 400px; overflow: hidden;">
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-3" alt="...">
            </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top mt-3" alt="...">
            @endif

            <article class="fs-5 mt-2">
                {!! $post->body !!}
            </article>

        </div>
    </div>
</div>
@endsection
