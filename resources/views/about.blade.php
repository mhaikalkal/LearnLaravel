@extends('layouts.main')

@section('container')
    <h1 class="mt-4">Halaman About</h1>
    <h5>{{ $name }}</h5>
    <h5>{{ $email }}</h5>
    <img src="img/{{ $image }}" alt="..." width="200px" class="rounded-circle">
@endsection
