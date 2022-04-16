@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
</div>
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="table-responsive col-lg-10">
    <a href="/dashboard/posts/create" class="btn btn-success mb-3">Create New Post</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td> {{-- mirip i = 0; i <= data.length; i++ --}}
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>
                        <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
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

{{-- <script>
    const delete = document.querySelector('#delete');

    delete.addEventListener('click', function(e) {
        e.preventDefault();
        return confirm('Are you sure?');
    });
</script> --}}

@endsection
