<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Household;

class Evacuation extends Model
{
    protected $fillable = [
        'household_id',
        'evacuation_status',
        'evacuation_center',
        'evacuees_count',
        'evacuated_at',
        'returned_home_at',
        'remarks',
    ];

    protected $casts = [
        'evacuated_at' => 'datetime',
        'returned_home_at' => 'datetime',
    ];

    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}