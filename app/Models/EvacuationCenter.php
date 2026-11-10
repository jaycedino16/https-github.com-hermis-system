<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Evacuation;

class EvacuationCenter extends Model
{
    protected $fillable = [
        'center_name',
        'address',
        'purok',
        'barangay',
        'contact_person',
        'contact_number',
        'capacity',
        'facilities',
        'latitude',
        'longitude',
        'status',
    ];

    public function evacuations()
    {
        return $this->hasMany(
            Evacuation::class,
            'evacuation_center',
            'center_name'
        );
    }
}
