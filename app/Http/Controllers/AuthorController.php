<?php

namespace App\Http\Controllers;

use App\Http\Requests\Author\Create;
use App\Http\Requests\Author\Update;
use App\Services\AuthorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class AuthorController extends Controller
{

    protected $authorService;

    /**
     *  Construct.
     *
     * @param $authorService
     * @return void
     */
    public function __construct(
        AuthorService $authorService
    )
    {
        $this->authorService = $authorService;
    }

    /**
     * Display a listing of the author.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = $this->authorService->all();

        return view('author.index',compact('authors'));
    }

    /**
     * Show the form for creating a new author.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created author in database.
     *
     * @param  \App\Http\Requests\Author\Create  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Create $request)
    {
        $data = $request->only('name','surname');
        $author = $this->authorService->create($data);

        return Redirect(route('author.show',$author->id));
    }

    /**
     * Display the specified author.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = $this->authorService->find($id);

        return view('author.show',compact('author'));
    }

    /**
     * Show the form for editing the specified author.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = $this->authorService->find($id);

        return view('author.edit',compact('author'));
    }

    /**
     * Update the specified author in database.
     *
     * @param  \App\Http\Requests\Author\Update  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        $data = $request->all();
        if($this->authorService->update($data,$id)){

            return Redirect(route('author.show',$id));
        }

        return Redirect::back();
    }

    /**
     * Remove the specified author from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->authorService->delete($id)) {

            return Redirect(route('author.index'));
        }

        return Redirect::back();
    }

    /*
     *  get author list
     *
     * @param  \IIlluminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * */
    public function autocomplete(Request $request){
        $name = $request->only('name');
        $authors = $this->authorService->autocomplete($name['name']);
        return Response::json($authors);
    }

    /**
     * Remove the specified authors_book from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyBook($id,$book_id)
    {
        if($this->authorService->deleteBook($id,$book_id)) {
            return Redirect(route('author.show',$id));
        }

        return Redirect::back();
    }}
