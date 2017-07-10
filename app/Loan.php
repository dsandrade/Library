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

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function reader()
    {
        return $this->belongsTo(Reader::class, 'reader_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
