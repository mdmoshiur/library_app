<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return the add book view
        return view('add_book');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $book = new Book;
        $book->title = $request->input('title');
        $book->subject = $request->input('subject');

        //save this book info to the book table
        $book->save();

        //need to update the pivot table
        $author_text = $request->input('authors');
        // convert string to integer array
        $authorArr = array_map('intval', explode(',', $author_text));
        // dd($authorArr);
        
        foreach ($authorArr as $author){
            $book->authors()->syncWithoutDetaching($author);  
        }

        return redirect('show_books');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //dd($book->authors()->name);
        return view('show_books')->with('bookArr', Book::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book, $id)
    {
        return view('edit_book')->with('bookArr', Book::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book = Book::find($request->id);
        $book->title = $request->input('title');
        $book->subject = $request->input('subject');

        //save this
        $book->save();

        //need to update the pivot table
        $author_text = $request->input('authors');
        // convert string to integer array
        $authorArr = array_map('intval', explode(',', $author_text));
        // dd($authorArr);
        
        foreach ($authorArr as $author){
            $book->authors()->syncWithoutDetaching($author);  
        }

        return redirect('show_books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book, $id)
    {
        $book = Book::find($id);
        $book->authors()->detach();
        Book::destroy(array('id', $id));
        return redirect('show_books');
    }
}
