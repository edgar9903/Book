<?php

namespace App\Repositories;

use App\Models\AuthorsBook;

class AuthorsBookRepository extends Repository
{
    /**
     * @var $model
     */
    protected $model;

    /**
     *  Construct.
     *
     * @param $authors_book
     * @return void
     */
    public function __construct(AuthorsBook $authors_book)
    {
        $this->model = $authors_book;
    }

}