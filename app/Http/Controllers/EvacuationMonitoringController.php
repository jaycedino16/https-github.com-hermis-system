<?php

namespace App\Http\Controllers;

use App\Models\Household;
use App\Models\Evacuation;
use App\Models\EvacuationCenter;
use Illuminate\Http\Request;

class EvacuationMonitoringController extends Controller
{
    // DISPLAY EVACUATION MONITORING
    public function index()
    {
        $households = Household::with('evacuations')
            ->latest()
            ->get();

        // Get registered evacuation centers for the dropdown
        $evacuationCenters = EvacuationCenter::orderBy('center_name')
            ->get();

        $totalHouseholds = $households->count();

        $totalEvacuated = Evacuation::where(
            'evacuation_status',
            'Evacuated'
        )->count();

        $totalForEvacuation = Evacuation::where(
            'evacuation_status',
            'For Evacuation'
        )->count();

        $totalReturnedHome = Evacuation::where(
            'evacuation_status',
            'Returned Home'
        )->count();

        $totalEvacuees = Evacuation::where(
            'evacuation_status',
            'Evacuated'
        )->sum('evacuees_count');

        return view('evacuation-monitoring.index', compact(
            'households',
            'evacuationCenters',
            'totalHouseholds',
            'totalEvacuated',
            'totalForEvacuation',
            'totalReturnedHome',
            'totalEvacuees'
        ));
    }


    // UPDATE EVACUATION STATUS
    public function updateStatus(Request $request, Household $household)
    {
        $validated = $request->validate([
            'evacuation_status' => [
                'required',
                'in:Not Evacuated,For Evacuation,Evacuated,Returned Home'
            ],

            'evacuation_center' => 'required_if:evacuation_status,Evacuated|nullable|string|max:255',

            'evacuees_count' => [
                'required_if:evacuation_status,Evacuated',
                'nullable',
                'integer',
                'min:0',
                'max:' . $household->members,
            ],

            'remarks' => 'nullable|string|max:1000',
        ]);

        $status = $validated['evacuation_status'];

        // CHECK EVACUATION CENTER AND CAPACITY
        if ($status === 'Evacuated') {

            // Only active registered centers can receive evacuees
            $center = EvacuationCenter::where(
                'center_name',
                $validated['evacuation_center']
            )
            ->where('status', 'Active')
            ->first();

            if (!$center) {
                return back()
                    ->withErrors([
                        'evacuation_center' =>
                            'Please select an active registered evacuation center.'
                    ])
                    ->withInput();
            }

            $requestedEvacuees = (int) $validated['evacuees_count'];

            if ($requestedEvacuees < 1) {
                return back()
                    ->withErrors([
                        'evacuees_count' =>
                            'At least one evacuee is required for an Evacuated status.'
                    ])
                    ->withInput();
            }

            // Count current evacuees in this center.
            // Exclude the current household to avoid double-counting
            // when updating an existing evacuation record.
            $currentOccupants = Evacuation::where(
                'evacuation_center',
                $center->center_name
            )
            ->where('evacuation_status', 'Evacuated')
            ->where('household_id', '!=', $household->id)
            ->sum('evacuees_count');

            $availableSlots = max(
                0,
                (int) $center->capacity - (int) $currentOccupants
            );

            if ($requestedEvacuees > $availableSlots) {
                return back()
                    ->withErrors([
                        'evacuees_count' =>
                            'Not enough available slots in ' .
                            $center->center_name .
                            '. Available slots: ' .
                            $availableSlots .
                            '.'
                    ])
                    ->withInput();
            }
        }

        // CREATE OR UPDATE EVACUATION RECORD
        Evacuation::updateOrCreate(
            ['household_id' => $household->id],
            [
                'evacuation_status' => $status,

                'evacuation_center' =>
                    $validated['evacuation_center'] ?? null,

                'evacuees_count' => $status === 'Evacuated'
                    ? (int) $validated['evacuees_count']
                    : 0,

                'evacuated_at' => $status === 'Evacuated'
                    ? now()
                    : null,

                'returned_home_at' => $status === 'Returned Home'
                    ? now()
                    : null,

                'remarks' => $validated['remarks'] ?? null,
            ]
        );

        return redirect()
            ->route('evacuation-monitoring.index')
            ->with('success', 'Evacuation status updated successfully!');
    }
}
