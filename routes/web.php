<?php

use Illuminate\Support\Facades\Route;

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
    return Redirect('/book');
});

Route::get('author/autocomplete', 'AuthorController@autocomplete');
Route::get('book/author/{id},{author_id}', 'BookController@destroyAuthor')->name('book.remove.author');
Route::get('author/book/{id},{book_id}', 'AuthorController@destroyBook')->name('author.remove.book');

Route::resources([
    'book' => 'BookController',
    'author' => 'AuthorController',
]);