<?php

namespace Library;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function book_authors()
    {
        return $this->hasMany(Book_Author::class);
    }

}
