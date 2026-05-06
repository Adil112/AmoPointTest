<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'ip',
        'city',
        'url',
        'user_agent',
        'device',
        'hour',
    ];

    protected $casts = [
        'hour' => 'datetime',
    ];
}
