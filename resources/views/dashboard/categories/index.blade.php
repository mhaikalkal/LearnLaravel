@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">All Categories</h1>
</div>
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="table-responsive col-lg-6">
    <a href="/dashboard/posts/create" class="btn btn-success mb-3">Create New Post</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td> {{-- mirip i = 0; i <= data.length; i++ --}}
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                        <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
                            {{-- karena mau delete dan ada csrf token-nya, maka kita override methodnya biar jadi delete --}}
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" id="delete" onclick="return confirm('Are you sure?')">
                                <span data-feather="trash"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
