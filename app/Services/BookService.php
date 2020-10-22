<?php

namespace App\Services;

use App\Repositories\BookRepository;


class BookService
{
    /**
     * @var $bookRepository

     */
    protected $bookRepository;


    /**
     *  Construct.
     *
     * @param $UserRepository
     * @return void
     */
    public function __construct(
        BookRepository $bookRepository
    )
    {
        $this->bookRepository = $bookRepository;
    }
}
