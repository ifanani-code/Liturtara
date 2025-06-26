<?php
// app/Models/Cases.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    protected $table = 'cases';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'type',
        'level',
        'reward_token',
        'status',
        'category',
        'selected_talent_id',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proposals()
    {
        return $this->hasMany(CaseTalentProposal::class);
    }

    public function selectedTalent()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

public function review()
    {
        return $this->hasOne(Review::class, 'case_id');
    }

}
