<?php

namespace Library;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'login',
        'password',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

}