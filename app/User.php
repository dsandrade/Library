<?php

namespace Library;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

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

    public function getRememberTokenName()
    {
        return null; // not supported
    }

}