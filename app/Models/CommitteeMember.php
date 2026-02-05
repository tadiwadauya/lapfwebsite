<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommitteeMember extends Model
{
    protected $fillable = ['committee_id','member_name','qualifications','nominated_by','sort_order'];

    public function committee()
    {
        return $this->belongsTo(\App\Models\Committee::class);
    }
}

