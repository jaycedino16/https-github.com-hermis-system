<?php

namespace App\Http\Controllers;

use App\Models\Household;
use Illuminate\Http\Request;

class HouseholdController extends Controller
{
    // Display all households
    public function index(Request $request)
    {
        $query = Household::query();

        if ($request->filled('search')) {
            $query->where(
                'household_head',
                'like',
                '%' . $request->search . '%'
            );
        }

        if ($request->filled('risk_level')) {
            $query->where('risk_level', $request->risk_level);
        }

        $households = $query->latest()->get();

        $totalHouseholds = Household::count();
        $totalMembers = Household::sum('members');

        $highRiskHouseholds = Household::where(
            'risk_level',
            'High'
        )->count();

        return view('households.index', compact(
            'households',
            'totalHouseholds',
            'totalMembers',
            'highRiskHouseholds'
        ));
    }

    // Show Add Household form
    public function create()
    {
        return view('households.create');
    }

    // Save new household
    public function store(Request $request)
    {
        $validated = $request->validate([
            'household_head' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'purok' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'members' => 'required|integer|min:1',
            'risk_level' => 'required|in:Low,Moderate,High',
        ]);

        $validated['status'] = 'Registered';

        Household::create($validated);

        return redirect()
            ->route('households.index')
            ->with('success', 'Household successfully registered!');
    }

    // View Household Details
    public function show(Household $household)
    {
        return view('households.show', compact('household'));
    }

    // Show Edit Household Form
    public function edit(Household $household)
    {
        return view('households.edit', compact('household'));
    }

    // Update Household Information
    public function update(Request $request, Household $household)
    {
        $validated = $request->validate([
            'household_head' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'purok' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'members' => 'required|integer|min:1',
            'risk_level' => 'required|in:Low,Moderate,High',
        ]);

        $household->update($validated);

        return redirect()
            ->route('households.index')
            ->with('success', 'Household successfully updated!');
    }

    // Delete Household
    public function destroy(Household $household)
    {
        // Protect existing evacuation records
        if ($household->evacuations()->exists()) {
            return redirect()
                ->route('households.index')
                ->with('error', 'Cannot delete this household because it has existing evacuation records.');
        }

        $household->delete();

        return redirect()
            ->route('households.index')
            ->with('success', 'Household successfully deleted!');
    }
}
