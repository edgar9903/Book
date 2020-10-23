<?php

namespace App\Services;

use App\Repositories\AuthorRepository;
use App\Repositories\AuthorsBookRepository;

class AuthorService
{
    /**
     * @var $authorRepository
     * @var $authorsBookRepository
     */
    protected $authorRepository;
    protected $authorsBookRepository;



    /**
     *  Construct.
     * @param  $authorRepository;
     * @param $authorsBookRepository
     *
     * @return void
     */
    public function __construct(
        AuthorRepository $authorRepository,
        AuthorsBookRepository $authorsBookRepository

    )
    {
        $this->authorRepository = $authorRepository;
        $this->authorsBookRepository= $authorsBookRepository;
    }

    /*
     * Get all Authors.
     * @return mixed
    */
    public function all(){

        $authors = $this->authorRepository->orderBy('id','desc')->all();

        return $authors;
    }

    /*
     * find author from id.
     * @param int $id
     * @return mixed
    */
    public function find(int $id){

        $author = $this->authorRepository->find($id);

        return $author;
    }

    /**
     * Create author.
     * @param array $data
     * @return mixed
     */
    public function create(array $data){

        $create = [
            'name' => $data['name'],
            'surname' => $data['surname'],
        ];

        $author = $this->authorRepository->create($create);

        return $author;
    }

    /**
     * Update author.
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data,int $id)
    {
        $author = $this->authorRepository->whereOne(['id' => $id]);
        if ($author) {
            $update = [
                'name' => $data['name'],
                'surname' => $data['surname'],
            ];

            $author = $this->authorRepository->update($update, ['id' => $id]);

            return $author;

        }

        return false;
    }

    /**
     * delete author.
     * @param int $id
     * @return mixed
     */
    public function delete(int $id){
        $author = $this->authorRepository->whereOne(['id' => $id]);
        if ($author ) {
            $this->authorRepository->delete(['id' => $author->id]);
            return true;
        }

        return false;
    }

    /**
     * autocomplete.
     * @param string $name
     * @return mixed
     */
    public function autocomplete(string $name){
        $results = array();

        $authors = $this->authorRepository->whereLike([
            ['key' => 'name','value' => $name],
            ['key' => 'surname','value' => $name],
        ]);

        foreach ($authors as $author)
        {
            $results[] = [ 'id' => $author->id, 'value' => $author->name.' '.$author->surname];
        }

        return $results;
    }

    /**
     * delete authors_books.
     * @param int $id
     * @param int $book_id
     * @return mixed
     */
    public function deleteBook(int $id,int $book_id){
        $author = $this->authorsBookRepository->whereOne(['book_id' => $book_id,'author_id' => $id]);
        if ($author ) {
            $this->authorsBookRepository->delete(['id' => $author->id]);
            return true;
        }

        return false;
    }




}
