<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialPerformancePage extends Model
{
    protected $fillable = [
        'title',
        'cover_image',
        'pdf_file',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
