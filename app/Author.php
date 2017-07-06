<?php

namespace Library;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

}
