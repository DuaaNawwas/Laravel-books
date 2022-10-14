<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{

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
    public function index()
    {
        return view('books.index', ['books' => Book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            'author' => 'required',
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
        return view('books.edit')->with('book', Book::find($id));
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
        $formFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
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

        return redirect('/');
    }
}
