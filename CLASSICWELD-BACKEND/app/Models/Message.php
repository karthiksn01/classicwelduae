<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'type',
        'rating',
        'is_read'
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'rating' => 'integer'
    ];
}
