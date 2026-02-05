<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name','email','phone','subject','message','submitted_at'
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
    ];
}
