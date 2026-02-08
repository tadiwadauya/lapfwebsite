<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['full_name','photo','default_qualifications','sort_order','is_active'];

    public function committeeMemberships()
    {
        return $this->hasMany(\App\Models\CommitteeMember::class);
    }
}
