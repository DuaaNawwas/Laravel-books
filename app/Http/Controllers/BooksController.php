<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BooksController extends Controller
{

    public function __construct()
    {

        $this->middleware(['auth', 'verified'])->only('create');
    }


    // methods for hard coded data

    // public function index()
    // {
    //     return view('books.index', ['books' => Book::allBooks()]);
    // }

    // public function show($id)
    // {
    //     return view('books.show', ['book' => Book::oneBook($id)]);
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // // sort without updated column

        // if ($request['sort']) {
        //     if ($request['sort'] == 'oldest') {
        //         $books = Book::filter(request(['search']))->get();
        //     } else {
        //         $books = Book::latest()->filter(request(['search']))->get();
        //     }
        // } else {

        //     $books =  Book::filter(request(['search']))->get();
        // }

        // sort with updated column
        // if ($request['sort']) {
        //     if ($request['sort'] == 'oldest') {
        //         $books = Book::filter(request(['search']))->paginate(6);
        //     } else {
        //         $books = Book::filter(request(['search']))->orderBy('updated_at', 'desc')->paginate(6);
        //     }
        // } else {

        $books =  Book::filter(request(['search']))->paginate(6);
        // }

        // return view('books.index', ['books' => Book::latest()->filter(request(['search']))->get()]);
        return view('books.index', ['books' => $books]);
    }

    public function sort()
    {

        if (@request('sort')) {
            if (@request('sort') == 'oldest') {
                $books = Book::filter(request(['search']))->paginate(6);
            } else {
                $books = Book::filter(request(['search']))->orderBy('updated_at', 'desc')->paginate(6);
            }
        } else {

            $books =  Book::filter(request(['search']))->paginate(6);
        }

        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create-book');
        return view('books.create', ['authors' => Author::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Gate::authorize('create-book', Book::class);
        // dd($request->all());

        // ---------------------------------------------------
        // // insert one by one without fillable
        // $book = new Book;

        // $book->title = $request->title;
        // $book->author = $request->author;
        // $book->language = $request->language;
        // $book->country = $request->country;
        // $book->year = $request->year;
        // $book->pages = $request->pages;
        // $book->description = $request->description;

        // $book->save();

        // ---------------------------------------------------
        // // needs fillable
        // Book::create([
        //     'title' => $request->title,
        //     'author' => $request->author,
        //     'language' => $request->language,
        //     'country' => $request->country,
        //     'year' => $request->year,
        //     'pages' => $request->pages,
        //     'description' => $request->description
        // ]);


        // ---------------------------------------------------
        // Book::create($request->all());


        // ---------------------------------------------------
        $formFields = $request->validate([
            'title' => 'required',
            'author_id' => 'required',
            'language' => 'required',
            'country' => 'required',
            'year' => 'required',
            'pages' => 'required',
            'description' => 'required'
        ]);


        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        Book::create($formFields);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('books.show', ['book' => Book::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update',  Book::find($id));
        return view('books.edit')->with('book', Book::find($id))->with('authors', Author::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update',  Book::find($id));
        $formFields = $request->validate([
            'title' => 'required',
            'author_id' => 'required',
            'language' => 'required',
            'country' => 'required',
            'year' => 'required',
            'pages' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        Book::where('id', $id)->update($formFields);

        // return back()->with('message', 'Book updated successfully');
        return redirect('/books/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::where('id', $id)->delete();
        // Book::destroy($id);
        return redirect('/');
    }

    // Show deleted books page
    public function trash()
    {
        return view('books.trash', ['books' => Book::onlyTrashed()->get()]);
    }

    // Force delete book
    public function forceDelete($id)
    {
        // Gate::authorize('forceDelete', Book::class);
        Book::where('id', $id)->forceDelete();

        return back();
    }

    // Restore a deleted book
    public function restore($id)
    {
        Book::where('id', $id)->restore();

        return redirect('/');
    }


    // Show author information
    public function author($id)
    {
        return view('books.author', ['author' => Author::find($id)]);
    }

    public function dash()
    {
        return view('books.dashboard');
    }
}
