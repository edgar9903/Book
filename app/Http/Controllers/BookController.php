<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\Create;
use App\Http\Requests\Book\Update;
use App\Services\BookService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    protected $bookService;

    /**
     *  Construct.
     *
     * @param $bookService
     * @return void
     */
    public function __construct(
        BookService $bookService
    )
    {
        $this->bookService = $bookService;
    }


    /**
     * Display a listing of the book.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->bookService->all();

        return view('book.index',compact('books'));
    }

    /**
     * Show the form for creating a new book.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created book in database.
     *
     * @param  \App\Http\Requests\Book\Create  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Create $request)
    {

        $data = $request->only('name','authors');
        $book = $this->bookService->create($data);

        return Redirect(route('book.show',$book->id));
    }

    /**
     * Display the specified book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->bookService->find($id);

        return view('book.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = $this->bookService->find($id);

        return view('book.edit',compact('book'));
    }

    /**
     * Update the specified book from database.
     *
     * @param  \App\Http\Requests\Book\Update  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        $data = $request->all();
        if($this->bookService->update($data,$id)){

            return Redirect(route('book.show',$id));
        }

        return Redirect::back();
    }

    /**
     * Remove the specified book from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->bookService->delete($id)) {

            return Redirect(route('book.index'));
        }

        return Redirect::back();
    }


    /**
     * Remove the specified authors_book from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAuthor($id,$author_id)
    {
        if($this->bookService->deleteAuthor($id,$author_id)) {
            return Redirect(route('book.show',$id));
        }

        return Redirect::back();
    }
}
