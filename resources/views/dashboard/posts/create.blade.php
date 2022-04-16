@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create a New Post</h1>
</div>

<div class="col-lg-8 mb-5">
    <form method="POST" action="/dashboard/posts" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required autofocus>
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select @error('title') is-invalid @enderror" id="category" name="category_id" required>
                @foreach ($categories as $category)
                    @if (old('category_id') == $category->id) {{-- Kalau isi yg lama nya sama, maka pilih lagi --}}
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Thumbnail</label>
            <img class="img-preview img-fluid mb-3 col-sm-6">
            <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>

</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    // Kalau mau tanpa package lain lagi pake ini
    // title.addEventListener('change', function() {
    //     let preSlug = title.value
    //     preslug = preslug.replace(/ /g,"-")
    //     slug.value = preslug.toLowerCase()
    // })

    // Karena kita ikutin tutor pak dhika, maka
    title.addEventListener('change', function() {
        fetch('/dashboard/post/checkSlug?title=' + title.value)
            .then(response => response.json()) // hasilnya berupa json. tapi masih promise
            .then(data => slug.value = data.slug) // then json dinamain jadi 'data'. dan slug.value
    });


    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }

    }
</script>

@endsection
