<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['case_id', 'reviewer_id', 'rating', 'comment'];

    public function case()
    {
        return $this->belongsTo(Cases::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }
}
