<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class SearchController extends Controller
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

    public function search_book(Request $request){
        $search_key = $request->input('book_name');
        $books = Book::where('title', 'like', '%'.$search_key.'%')->get();
        
        return view('search_book_view', ['books' => $books]);
    }

    public function search_author(Request $request){
        $search_key = $request->input('author_name');
        $authors = Author::where('name','like', '%'.$search_key.'%')->get();
        
        return view('search_author_view', ['authors' => $authors]);
    }



}
