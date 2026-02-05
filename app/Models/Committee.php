<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    protected $fillable = ['name','sort_order','is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function members()
    {
        return $this->hasMany(\App\Models\CommitteeMember::class);
    }
}

