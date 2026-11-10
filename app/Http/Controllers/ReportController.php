<?php

namespace App\Http\Controllers;

use App\Models\Household;
use App\Models\Evacuation;
use App\Models\EvacuationCenter;

class ReportController extends Controller
{
    public function index()
    {
        // ==========================================
        // HOUSEHOLD REPORT
        // ==========================================

        $households = Household::orderBy('household_head')->get();

        $totalHouseholds = Household::count();

        $totalResidents = Household::sum('members');


        // ==========================================
        // RISK ASSESSMENT REPORT
        // ==========================================

        $lowRisk = Household::where('risk_level', 'Low')->count();

        $moderateRisk = Household::where('risk_level', 'Moderate')->count();

        $highRisk = Household::where('risk_level', 'High')->count();


        // ==========================================
        // EVACUATION REPORT
        // ==========================================

        $evacuations = Evacuation::with('household')
            ->latest()
            ->get();

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


        // ==========================================
        // EVACUATION CENTER REPORT
        // ==========================================

        $evacuationCenters = EvacuationCenter::orderBy(
            'center_name'
        )->get();

        $centerOccupants = Evacuation::where(
            'evacuation_status',
            'Evacuated'
        )
        ->selectRaw('evacuation_center, SUM(evacuees_count) as occupants')
        ->groupBy('evacuation_center')
        ->pluck('occupants', 'evacuation_center');

        $activeCenters = EvacuationCenter::where(
            'status',
            'Active'
        )->count();

        $totalCapacity = EvacuationCenter::where(
            'status',
            'Active'
        )->sum('capacity');

        $totalCurrentOccupants = 0;
        $totalAvailableSlots = 0;

        foreach ($evacuationCenters as $center) {

            $currentOccupants = (int) (
                $centerOccupants[$center->center_name] ?? 0
            );

            $availableSlots = $center->status === 'Active'
                ? max(0, (int) $center->capacity - $currentOccupants)
                : 0;

            $center->current_occupants = $currentOccupants;
            $center->available_slots = $availableSlots;

            if ($center->status === 'Active') {
                $totalCurrentOccupants += $currentOccupants;
                $totalAvailableSlots += $availableSlots;
            }
        }


        // ==========================================
        // DISPLAY REPORTS PAGE
        // ==========================================

        return view('reports.index', compact(
            'households',
            'totalHouseholds',
            'totalResidents',
            'lowRisk',
            'moderateRisk',
            'highRisk',
            'evacuations',
            'totalEvacuated',
            'totalEvacuees',
            'totalForEvacuation',
            'totalReturnedHome',
            'evacuationCenters',
            'activeCenters',
            'totalCapacity',
            'totalCurrentOccupants',
            'totalAvailableSlots'
        ));
    }
}
