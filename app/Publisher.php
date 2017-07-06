<?php

namespace Library;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
}
