<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PensionerImage extends Model
{
    protected $fillable = [
        'title',
        'image',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'display_order' => 'integer',
        'is_active' => 'boolean',
    ];
}
