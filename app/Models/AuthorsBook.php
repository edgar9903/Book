<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorsBook extends Model
{
    use HasFactory;

    protected $table = 'authors_books';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_id',
        'author_id',
    ];

    /**
     * Get the owning authors_book model.
     */
    public function authors_book()
    {
        return $this->morphTo();
    }
}
