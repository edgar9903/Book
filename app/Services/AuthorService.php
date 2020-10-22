<?php

namespace App\Services;

use App\Repositories\AuthorRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class AuthorService
{
    /**
     * @var $authorRepository
     */
    protected $authorRepository;


    /**
     *  Construct.
     * @param  $authorRepository;
     * @return void
     */
    public function __construct(
        AuthorRepository $authorRepository
    )
    {
        $this->authorRepository = $authorRepository;
    }

}
