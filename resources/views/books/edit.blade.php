@extends('layout.layout')

@section('title', 'Edit')


@section('content')
    <div class="container pt-5">
        <div class="my-5">
            <a href="/">
                <button type="button" class="btn btn-dark btn-rounded"><i class="fas fa-arrow-left"></i> Back</button>
            </a>
        </div>

        <h1 class="text-center mb-5">Edit</h1>
        <form action="/books/{{ $book->id }}" method="post" class="w-50 m-auto" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Book title input -->
            <div class="form-outline mb-4">
                <input type="text" name="title" id="book-title" class="form-control" value="{{ $book->title }}" />
                <label class="form-label" for="book-title">Book Title</label>

            </div>
            @error('title')
                <p class="text-danger small" style="margin-top: -1.5rem">{{ $message }}</p>
            @enderror

            <!-- Author input -->
            <div class="form-outline mb-4">
                <input type="text" name="author" id="book-author" class="form-control" value="{{ $book->author }}" />
                <label class="form-label" for="book-author">Book Author</label>
            </div>

            @error('author')
                <p class="text-danger small" style="margin-top: -1.5rem">{{ $message }}</p>
            @enderror

            <!-- Language input -->
            <div class="form-outline mb-4">
                <input type="text" name="language" id="book-language" class="form-control"
                    value="{{ $book->language }}" />
                <label class="form-label" for="book-language">Book Language</label>
            </div>

            @error('language')
                <p class="text-danger small" style="margin-top: -1.5rem">{{ $message }}</p>
            @enderror

            <!-- Country input -->
            <div class="form-outline mb-4">
                <input type="text" name="country" id="book-country" class="form-control" value="{{ $book->country }}" />
                <label class="form-label" for="book-country">Book Country</label>

            </div>
            @error('country')
                <p class="text-danger small" style="margin-top: -1.5rem">{{ $message }}</p>
            @enderror

            <!-- Year Published input -->
            <div class="form-outline mb-4">
                <input type="number" name="year" id="book-year" class="form-control" value="{{ $book->year }}" />
                <label class="form-label" for="book-year">Year Published</label>
            </div>

            @error('year')
                <p class="text-danger small" style="margin-top: -1.5rem">{{ $message }}</p>
            @enderror

            <!-- Book Pages input -->
            <div class="form-outline mb-4">
                <input type="number" name="pages" id="book-pages" class="form-control" value="{{ $book->pages }}" />
                <label class="form-label" for="book-pages">Book Pages</label>
            </div>

            @error('pages')
                <p class="text-danger small" style="margin-top: -1.5rem">{{ $message }}</p>
            @enderror

            <!-- Book Cover input -->
            <div class="form-outline mb-4">
                <input type="file" name="image" id="book-image" class="form-control" />
                <label class="form-label" for="book-image">Book Cover</label>
            </div>
            <img src="{{ asset('storage/' . $book['image']) }}" alt="" class="img-fluid w-25 " />
            @error('image')
                <p class="text-danger small" style="margin-top: -1.5rem">{{ $message }}</p>
            @enderror
            <!-- Description input -->
            <div class="form-outline mb-4">
                <textarea class="form-control" name="description" id="book-description" rows="4">{{ $book->description }}</textarea>
                <label class="form-label" for="book-description">Book Description</label>

            </div>
            @error('description')
                <p class="text-danger small" style="margin-top: -1.5rem">{{ $message }}</p>
            @enderror



            <!-- Submit button -->
            <button type="submit" class="btn btn-dark btn-block mb-4">Update</button>
        </form>

    </div>
@endsection
