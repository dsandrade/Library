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

    public function books()
    {
        return $this->belongsTo(Book::class, 'id');
    }

    public function authors()
    {
        return $this->belongsTo(Author::class, 'id');
    }

}
