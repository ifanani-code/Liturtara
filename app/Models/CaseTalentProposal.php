<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseTalentProposal extends Model
{
    protected $fillable = ['case_id', 'user_id', 'proposal_text', 'status'];

    public function case()
    {
        return $this->belongsTo(Cases::class);
    }

    public function talent()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
