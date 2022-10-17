@extends('layout.layout')

@section('title', 'LaraBooks')


@section('content')
    <div class="container py-5">
        <form class="input-group" action="/">
            <div class="form-outline">
                <input type="search" id="form1" class="form-control" name="search" value="{{ @request('search') }}" />
                <label class="form-label" for="form1">Search</label>
            </div>
            <button type="submit" class="btn btn-dark">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <div class="my-5">
            <a href="/books/create">
                <button type="button" class="btn btn-dark btn-rounded"><i class="fas fa-plus"></i> Add a book</button>
            </a>
            @auth
                <a href="/trash">
                    <button type="button" class="btn btn-light btn-rounded"><i class="fas fa-trash"></i> Deleted Books</button>
                </a>
            @endauth
            <!-- Light -->
            <div class="btn-group shadow-0">
                <button type="button" class="btn btn-light dropdown-toggle" data-mdb-toggle="dropdown"
                    aria-expanded="false">
                    Sort
                </button>
                {{-- <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/?sort=oldest">Oldest to Newest</a></li>
                    <li><a class="dropdown-item" href="/?sort=newest">Newest to Oldest</a></li>
                </ul> --}}
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/oldest">Oldest to Newest</a></li>
                    <li><a class="dropdown-item" href="/newest">Newest to Oldest</a></li>
                </ul>
            </div>
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

    <div class="mt-6 p-4">
        {{ $books->links() }}
    </div>
@endsection
