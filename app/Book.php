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
}
