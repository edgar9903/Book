<?php

namespace App\Services;

use App\Repositories\BookRepository;
use App\Repositories\AuthorsBookRepository;


class BookService
{
    /**
     * @var $bookRepository
     * @var $authorsBookRepository
     */
    protected $bookRepository;
    protected $authorsBookRepository;


    /**
     *  Construct.
     *
     * @param $bookRepository
     * @param $authorsBookRepository
     * @return void
     */
    public function __construct(
        BookRepository $bookRepository,
        AuthorsBookRepository $authorsBookRepository
    )
    {
        $this->bookRepository = $bookRepository;
        $this->authorsBookRepository= $authorsBookRepository;
    }

    /*
     * Get all books.
     * @return mixed
    */
    public function all(){

        $books = $this->bookRepository->orderBy('id','desc')->all();

        return $books;
    }

    /*
     * find book from id.
     * @param int $id
     * @return mixed
    */
    public function find(int $id){

        $book = $this->bookRepository->find($id);

        return $book;
    }

    /**
     * Create book.
     * @param array $data
     * @return mixed
     */
    public function create(array $data){

        $create = ['name' => $data['name']];

        $book = $this->bookRepository->create($create);
        $authors = array_unique($data['authors']);
        foreach ($authors as $author) {
            $this->authorsBookRepository->create([
                'book_id' => $book->id,
                'author_id' => $author
            ]);
        }
        return $book;
    }

    /**
     * Update book.
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data,int $id)
    {
        $book = $this->bookRepository->whereOne(['id' => $id]);
        if ($book) {
            $update = ['name' => $data['name']];

            $check = $this->bookRepository->update($update, ['id' => $id]);

            $authors = array_unique($data['authors']);
            foreach ($authors as $author) {

                if (!in_array($author,$book->authors->pluck('id')->toArray())) {
                    $this->authorsBookRepository->create([
                        'book_id' => $book->id,
                        'author_id' => $author
                    ]);
                }

            }

            return $check;

        }

        return false;
    }

    /**
     * delete book.
     * @param int $id
     * @return mixed
     */
    public function delete(int $id){
        $book = $this->bookRepository->whereOne(['id' => $id]);
        if ($book ) {
            $this->bookRepository->delete(['id' => $book->id]);
            return true;
        }

        return false;
    }

    /**
     * delete authors_books.
     * @param int $id
     * @param int $author_id
     * @return mixed
     */
    public function deleteAuthor(int $id,int $author_id){
        $book = $this->authorsBookRepository->whereOne(['book_id' => $id,'author_id' => $author_id]);
        if ($book ) {
            $this->authorsBookRepository->delete(['id' => $book->id]);
            return true;
        }

        return false;
    }


}
