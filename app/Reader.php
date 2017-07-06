<?php

namespace Library;

use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

}
