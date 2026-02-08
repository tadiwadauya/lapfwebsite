<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Department extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'short_description',
        'description',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'display_order' => 'integer',
    ];

    // Auto-generate slug if empty
    public static function booted()
    {
        static::saving(function ($dept) {
            if (empty($dept->slug) && !empty($dept->name)) {
                $dept->slug = Str::slug($dept->name);
            }
        });
    }
}
