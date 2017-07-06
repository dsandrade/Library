<?php

namespace Library;

use Illuminate\Database\Eloquent\Model;

class Book_Author extends Model
{

    public $table = "book_authors";

    public $timestamps = false;

    protected $fillable = [
        'book_id',
        'author_id',
    ];
}
