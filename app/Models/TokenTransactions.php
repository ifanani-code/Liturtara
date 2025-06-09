<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TokenTransactions extends Model
{
    protected $fillable = [
        'user_id',
        'token_amount',
        'total_price',
        'status',
        'payment_type',
        'transaction_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
