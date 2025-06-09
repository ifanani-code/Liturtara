<?php
// app/Models/UserPoint.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPoint extends Model
{
    protected $fillable = ['user_id', 'points', 'level'];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
