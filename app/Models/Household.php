<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Evacuation;

class Household extends Model
{
    protected $fillable = [
        'household_head',
        'contact_number',
        'purok',
        'barangay',
        'members',
        'risk_level',
        'status',

        // Household Risk Assessment
        'hazard_exposure',
        'distance_from_hazard',
        'vulnerable_members',
        'house_condition',
        'evacuation_accessibility',
        'risk_score',
        'risk_assessed_at',
    ];

    protected $casts = [
        'vulnerable_members' => 'integer',
        'risk_score' => 'integer',
        'risk_assessed_at' => 'datetime',
    ];

    /**
     * Get all evacuation records associated with this household.
     */
    public function evacuations()
    {
        return $this->hasMany(Evacuation::class);
    }
}
