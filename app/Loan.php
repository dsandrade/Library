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

    protected $casts = [
        'withdrawal_at' => 'date',
        'return_date' => 'date',
        'returned_at' => 'date',
        'canceled_at' => 'date',
    ];

    public function books()
    {
        return $this->belongsTo(Book::class, 'id');
    }

    public function readers()
    {
        return $this->belongsTo(Reader::class, 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
