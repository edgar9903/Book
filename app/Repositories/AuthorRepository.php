<?php

namespace App\Repositories;

use App\Models\Author;

class AuthorRepository extends Repository
{
    /**
     * @var $model
     */
    protected $model;
    /**
     *  Construct.
     *
     * @param $author
     * @return void
     */
    public function __construct(Author $author)
    {
        $this->model = $author;
    }

}