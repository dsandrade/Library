<?php

namespace Library;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'book_id',
        'reader_id',
        'withdrawal_at',
        'return_date',
        'returned_at',
        'canceled_at',
        'user_id',
    ];
}
