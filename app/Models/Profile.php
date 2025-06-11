<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['full_name', 'phone_number', 'birth_date', 'address'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}

