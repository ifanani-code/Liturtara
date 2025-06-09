<?php

// app/Models/Token.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $fillable = ['user_id', 'amount'];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
