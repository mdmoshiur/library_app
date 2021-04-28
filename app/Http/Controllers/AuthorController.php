<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use function GuzzleHttp\Promise\all;

class AuthorController extends Controller
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
        //
        return view('create_author');
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
        $author = new Author;
        $author->name = $request->input('name');
        $author->email = $request->input('email');
        $author->address = $request->input('address');

        //save this
        $author->save();
    
        return redirect("show_authors");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('show_author')->with('authorArr', Author::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author, $id)
    {
        //
        return view('edit_author')->with('authorArr', Author::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        //
        $author = Author::find($request->id);
        $author->name = $request->input('name');
        $author->email = $request->input('email');
        $author->address = $request->input('address');

        //save this
        $author->save();

        return redirect('show_authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author, $id)
    {
        $author = Author::find($id);
        $author->books()->detach();
        Author::destroy(array('id', $id));
        return redirect('show_authors');
    }
}
