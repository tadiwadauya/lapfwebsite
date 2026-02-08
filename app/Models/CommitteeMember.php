<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommitteeMember extends Model
{
    protected $fillable = [
        'committee_id',
        'person_id',
        'member_name',
        'qualifications',
        'nominated_by',
        'sort_order',
        'is_chairperson',
    ];

    public function committee()
    {
        return $this->belongsTo(\App\Models\Committee::class);
    }

    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class);
    }
}


