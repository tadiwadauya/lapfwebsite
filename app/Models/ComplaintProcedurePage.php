<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintProcedurePage extends Model
{
    protected $fillable = [
        'title',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
