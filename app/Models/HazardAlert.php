<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HazardAlert extends Model
{
    protected $fillable = [
        'title',
        'hazard_type',
        'severity',
        'description',
        'affected_area',
        'status',
        'issued_at',
        'expires_at',
    ];

    protected $casts = [
        'issued_at' => 'datetime',
        'expires_at' => 'datetime',
    ];
}
