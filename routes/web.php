<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('show_books')->with('bookArr', Book::all());
});

Route::get('show_authors', 'AuthorController@show');
Route::get('delete_author/{id}', 'AuthorController@destroy');
Route::get('create_author', 'AuthorController@create');
Route::get('edit_author/{id}', 'AuthorController@edit');
Route::post('create_new_author', 'AuthorController@store');
Route::post('update_author/{id}', 'AuthorController@update')->name('update_author');

Route::get('add_book', 'BookController@create');
Route::post('add_new_book', 'BookController@store');
Route::get('show_books', 'BookController@show');
Route::get('delete_book/{id}', 'BookController@destroy');
Route::get('edit_book/{id}', 'BookController@edit');
Route::post('update_book/{id}', 'bookController@update')->name('update_book');

Route::post('search_book', 'SearchController@search_book');
Route::post('search_author', 'SearchController@search_author');