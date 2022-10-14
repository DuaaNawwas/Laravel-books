@extends('layout.layout')

@section('title', $book['title'])


@section('content')

    <div class="container my-5">
        <div class="my-5">
            <a href="/books">
                <button type="button" class="btn btn-dark btn-rounded"><i class="fas fa-arrow-left"></i> Back</button>
            </a>
        </div>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 ">
                    <img src="{{ asset('storage/' . $book['image']) }}" class="img-fluid rounded-start" style="width:400px"
                        alt="" />
                </div>

                <div class="col-md-8">
                    <div class="card-body pt-5">
                        <h1 class="card-title pt-4">{{ $book['title'] }}</h1>
                        <p class="card-text fs-4 pb-3">
                            {{ $book['description'] }}
                        </p>
                        <div class="pb-5 pt-3">
                            <p class="card-text">
                                <small class="text-muted">Author: {{ $book['author'] }}</small>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Year: {{ $book['year'] }}</small>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Pages: {{ $book['pages'] }}</small>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Country: {{ $book['country'] }}</small>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Language: {{ $book['language'] }}</small>
                            </p>
                        </div>
                        {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
                        {{-- <button type="button" class="btn btn-info">Edit</button> --}}
                        <div class="d-flex">
                            <a href="{{ $book->id }}/edit" class="mx-2">
                                <button type="button" class="btn btn-info btn-floating">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </a>
                            <form action="/books/{{ $book->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-floating">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
