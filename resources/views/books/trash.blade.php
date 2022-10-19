@extends('layout.layout')

@section('title', 'Trash')


@section('content')
    <div class="container py-5">
        <div class="my-5">
            <a href="/books">
                <button type="button" class="btn btn-dark btn-rounded"><i class="fas fa-arrow-left"></i> Back</button>
            </a>
        </div>
        @if (count($books) != 0)
            <div class="row">
                @foreach ($books as $book)
                    <div class="col-sm-6">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $book['image']) }}" alt=""
                                        class="img-fluid rounded-start" />

                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title text-black">{{ $book['title'] }}</h5>
                                        <p class="card-text text-black">
                                            <small> {{ $book['description'] }} </small>
                                        </p>
                                        <p class="card-text">
                                            <small
                                                class="text-muted">{{ $book->author->name . ' ' . $book['year'] }}</small>
                                        </p>
                                        <div class="d-flex justify-content-around">
                                            <a href="/restore/{{ $book['id'] }}">
                                                <button type="button" class="btn btn-info">
                                                    Restore
                                                </button>
                                            </a>

                                            {{-- <form action="/forcedelete/{{ $book['id'] }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick=" return confirm('Are you sure you want to delete?')">
                                                    Delete
                                                </button>
                                            </form> --}}

                                            <button type="button" class="btn btn-danger" data-mdb-toggle="modal"
                                                data-mdb-target="#exampleModal2">
                                                Delete
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal2" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you
                                                                want to permenantly delete
                                                                this book?</h5>
                                                            <button type="button" class="btn-close"
                                                                data-mdb-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">This action is irreversible
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-mdb-dismiss="modal">Cancel</button>
                                                            <form action="/forcedelete/{{ $book['id'] }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h1>There is no deleted books</h1>
        @endif
    </div>

@endsection
