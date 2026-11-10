<?php

namespace App\Http\Controllers;

use App\Models\Evacuation;
use App\Models\EvacuationCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EvacuationCenterController extends Controller
{
    // DISPLAY EVACUATION CENTERS WITH OCCUPANCY INFORMATION
    public function index()
    {
        $evacuationCenters = EvacuationCenter::latest()->get();

        // Calculate current occupants for each registered center
        foreach ($evacuationCenters as $center) {

            $centerName = mb_strtolower(
                trim((string) $center->center_name)
            );

            $currentOccupants = Evacuation::where(
                'evacuation_status',
                'Evacuated'
            )
            ->whereRaw(
                'LOWER(TRIM(evacuation_center)) = ?',
                [$centerName]
            )
            ->sum('evacuees_count');

            $currentOccupants = (int) $currentOccupants;

            $remainingCapacity = max(
                0,
                (int) $center->capacity - $currentOccupants
            );

            $center->current_occupants = $currentOccupants;
            $center->remaining_capacity = $remainingCapacity;

            // Only active centers can accept new evacuees
            $center->available_slots = $center->status === 'Active'
                ? $remainingCapacity
                : 0;
        }

        // SUMMARY STATISTICS
        $totalCenters = $evacuationCenters->count();

        $activeCenters = $evacuationCenters
            ->where('status', 'Active')
            ->count();

        $totalCapacity = $evacuationCenters->sum('capacity');

        $totalCurrentOccupants = $evacuationCenters
            ->sum('current_occupants');

        $totalAvailableSlots = $evacuationCenters
            ->sum('available_slots');

        return view('evacuation-centers.index', compact(
            'evacuationCenters',
            'totalCenters',
            'activeCenters',
            'totalCapacity',
            'totalCurrentOccupants',
            'totalAvailableSlots'
        ));
    }


    // ADD NEW EVACUATION CENTER
    public function store(Request $request)
    {
        $validated = $request->validate([
            'center_name' => [
                'required',
                'string',
                'max:255',
                'unique:evacuation_centers,center_name',
            ],
            'address' => 'required|string|max:255',
            'purok' => 'nullable|string|max:100',
            'barangay' => 'required|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'capacity' => 'required|integer|min:1',
            'facilities' => 'nullable|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'status' => 'required|in:Active,Inactive,Under Maintenance',
        ]);

        EvacuationCenter::create($validated);

        return redirect()
            ->route('evacuation-centers.index')
            ->with('success', 'Evacuation center added successfully!');
    }


    // UPDATE EXISTING EVACUATION CENTER
    public function update(
        Request $request,
        EvacuationCenter $evacuationCenter
    ) {
        $validated = $request->validate([
            'center_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('evacuation_centers', 'center_name')
                    ->ignore($evacuationCenter->id),
            ],
            'address' => 'required|string|max:255',
            'purok' => 'nullable|string|max:100',
            'barangay' => 'required|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'capacity' => 'required|integer|min:1',
            'facilities' => 'nullable|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'status' => 'required|in:Active,Inactive,Under Maintenance',
        ]);

        $oldCenterName = $evacuationCenter->center_name;

        // Get existing occupants before updating
        $currentOccupants = Evacuation::where(
            'evacuation_status',
            'Evacuated'
        )
        ->whereRaw(
            'LOWER(TRIM(evacuation_center)) = ?',
            [mb_strtolower(trim($oldCenterName))]
        )
        ->sum('evacuees_count');

        // Prevent capacity from becoming lower than current occupants
        if ((int) $validated['capacity'] < (int) $currentOccupants) {
            return back()
                ->withErrors([
                    'capacity' =>
                        'The capacity cannot be lower than the current number of evacuees (' .
                        $currentOccupants . ').'
                ])
                ->withInput();
        }

        // Update center and related evacuation records together
        DB::transaction(function () use (
            $evacuationCenter,
            $validated,
            $oldCenterName
        ) {

            $evacuationCenter->update($validated);

            // Automatically update existing evacuation assignments
            // when the center name changes
            if ($oldCenterName !== $validated['center_name']) {

                Evacuation::whereRaw(
                    'LOWER(TRIM(evacuation_center)) = ?',
                    [mb_strtolower(trim($oldCenterName))]
                )->update([
                    'evacuation_center' => $validated['center_name']
                ]);
            }
        });

        return redirect()
            ->route('evacuation-centers.index')
            ->with('success', 'Evacuation center updated successfully!');
    }


    // DELETE EVACUATION CENTER WITH RECORD PROTECTION
    public function destroy(EvacuationCenter $evacuationCenter)
    {
        $centerName = mb_strtolower(
            trim((string) $evacuationCenter->center_name)
        );

        // Check whether evacuation records are connected to this center
        $hasEvacuationRecords = Evacuation::whereRaw(
            'LOWER(TRIM(evacuation_center)) = ?',
            [$centerName]
        )->exists();

        // Prevent deletion when records exist
        if ($hasEvacuationRecords) {
            return redirect()
                ->route('evacuation-centers.index')
                ->withErrors([
                    'center' =>
                        'This evacuation center cannot be deleted because it has existing evacuation records. Please preserve its records and update its status instead.'
                ]);
        }

        $evacuationCenter->delete();

        return redirect()
            ->route('evacuation-centers.index')
            ->with('success', 'Evacuation center deleted successfully!');
    }
}
