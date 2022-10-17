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
                        @auth
                            <div class="d-flex">
                                <a href="{{ $book->id }}/edit" class="mx-2">
                                    <button type="button" class="btn btn-info btn-floating">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </a>

                                <button type="button" class="btn btn-danger btn-floating" data-mdb-toggle="modal"
                                    data-mdb-target="#exampleModal">
                                    <i class="fas fa-trash"></i>
                                </button>

                                {{-- <form action="/books/{{ $book->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-floating"
                                        onclick=" return confirm('Are you sure you want to delete?')">
                                        <i class="fas fa-trash"></i>
                                    </button>    
                                </form> --}}


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete
                                                    this book?</h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">You can find the deleted book in the deleted books page
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-mdb-dismiss="modal">Cancel</button>
                                                <form action="/books/{{ $book->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
