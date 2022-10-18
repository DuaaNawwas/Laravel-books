@extends('layout.layout')

@section('title', $author['name'])


@section('content')
    <div class="container my-5 text-center">
        <h2 class="my-4">Author Information</h2>
        <div class="card mx-auto" style="width: 18rem;">
            <ul class="list-group list-group-light">
                <li class="list-group-item px-3">Name: {{ $author->name }}</li>
                <li class="list-group-item px-3">Nationality: {{ $author->nationality }} </li>
                <li class="list-group-item px-3">Email: {{ $author->email }}</li>
            </ul>
        </div>

        <h2 class="my-4">Author Books</h2>

        <div class="row">
            @foreach ($author->books as $book)
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
                                                class="text-muted">{{ $book->author['name'] . ' ' . $book['year'] }}</small>
                                        </p>

                                    </div>
                                </div>
                            </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endsection
