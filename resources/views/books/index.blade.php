@extends('layout.layout')

@section('title', 'LaraBooks')


@section('content')
    <div class="container py-5">
        <div class="my-5">
            <a href="/books/create">
                <button type="button" class="btn btn-dark btn-rounded"><i class="fas fa-plus"></i> Add a book</button>
            </a>
        </div>
        @if (count($books) != 0)
            <div class="row">
                @foreach ($books as $book)
                    <div class="col-sm-6">
                        <div class="card mb-3" style="max-width: 540px;">
                            <a href="/books/{{ $book['id'] }}">
                                <div class="row g-0">
                                    <div class="col-md-4  hover-overlay hover-zoom hover-shadow ripple ">
                                        <img src="{{ asset('storage/' . $book['image']) }}" alt=""
                                            class="img-fluid rounded-start" />

                                        <div class="mask rounded" style="background-color: rgba(129, 129, 130, 0.138)">
                                        </div>

                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title text-black">{{ $book['title'] }}</h5>
                                            <p class="card-text text-black">
                                                <small> {{ $book['description'] }} </small>
                                            </p>
                                            <p class="card-text">
                                                <small
                                                    class="text-muted">{{ $book['author'] . ' ' . $book['year'] }}</small>
                                            </p>
                                            {{-- <div> --}}
                                            {{-- <a href="books/{{ $book->id }}/edit" class="btn btn-info btn-floating"> --}}
                                            {{-- <button type="button" class="btn btn-info btn-floating">
                                                    <i class="fas fa-edit"></i>
                                                </button> --}}
                                            {{-- </a> --}}
                                            {{-- <button type="button" class="btn btn-danger btn-floating">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <h1>There is currently no books available</h1>
        @endif
    </div>

@endsection
