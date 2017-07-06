<?php

namespace Library;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'publisher_id',
        'title',
        'description',
        'isbn',
    ];

    public function book_authors()
    {
        return $this->hasMany(Book_Author::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function publishers()
    {
        return $this->belongsTo(Publisher::class, 'id');
    }

}
