<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GovernancePage extends Model
{
    protected $fillable = ['title','overview','focus_areas','is_active'];

    protected $casts = [
        'focus_areas' => 'array',
        'is_active' => 'boolean',
    ];
}
