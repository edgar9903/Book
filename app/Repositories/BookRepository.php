<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository extends Repository
{
    /**
     * @var $model
     */
    protected $model;
    /**
     *  Construct.
     *
     * @param $Book
     * @return void
     */
    public function __construct(Book $Book)
    {
        $this->model = $Book;
    }

}