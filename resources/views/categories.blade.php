@extends('layouts.main')

@section('container')
    <h1 class="mt-4 mb-4">{{ $label }}</h1>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-md-4">
                <a href="/category/{{ $category->slug }}" class="text-decoration-none">
                    <div class="card bg-dark text-white" style="border: none;">
                        <img src="https://source.unsplash.com/300x300?{{ $category->name }}" class="card-img-top" alt="...">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title flex-fill text-center py-2 fs-5" style="background-color: rgba(0, 0, 0, 0.5)">{{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        </div>
    </div>

@endsection
