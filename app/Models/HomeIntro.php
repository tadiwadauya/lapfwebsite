<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeIntro extends Model
{
    protected $fillable = [
        'tagline',
        'title',
        'body',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
