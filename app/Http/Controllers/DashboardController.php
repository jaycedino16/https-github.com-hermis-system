<?php

namespace App\Http\Controllers;

use App\Models\Household;
use App\Models\Evacuation;
use App\Models\EvacuationCenter;

class DashboardController extends Controller
{
    public function index()
    {
        // Household Statistics
        $totalHouseholds = Household::count();

        $totalResidents = Household::sum('members');

        $highRiskHouseholds = Household::where(
            'risk_level',
            'High'
        )->count();

        // Evacuation Center Statistics
        $activeCenters = EvacuationCenter::where(
            'status',
            'Active'
        )->count();

        // Evacuation Statistics
        $totalEvacuated = Evacuation::where(
            'evacuation_status',
            'Evacuated'
        )->count();

        $totalEvacuees = Evacuation::where(
            'evacuation_status',
            'Evacuated'
        )->sum('evacuees_count');

        $totalForEvacuation = Evacuation::where(
            'evacuation_status',
            'For Evacuation'
        )->count();

        $totalReturnedHome = Evacuation::where(
            'evacuation_status',
            'Returned Home'
        )->count();

        // Recent Evacuation Activities
        $recentEvacuations = Evacuation::with([
            'household',
        ])
        ->latest()
        ->take(5)
        ->get();

        return view('dashboard', compact(
            'totalHouseholds',
            'totalResidents',
            'highRiskHouseholds',
            'activeCenters',
            'totalEvacuated',
            'totalEvacuees',
            'totalForEvacuation',
            'totalReturnedHome',
            'recentEvacuations'
        ));
    }
}