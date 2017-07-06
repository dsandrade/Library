<?php

namespace Library;

use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
}
