<?php

namespace App\Http\Controllers;

use App\Models\HazardAlert;
use Illuminate\Http\Request;

class HazardAlertController extends Controller
{
    public function index()
    {
        $hazardAlerts = HazardAlert::latest()->get();

        return view('hazard-alerts.index', compact('hazardAlerts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'hazard_type' => 'required|string|max:255',
            'severity' => 'required|in:Low,Moderate,High,Critical',
            'description' => 'required|string',
            'affected_area' => 'required|string|max:255',
            'status' => 'required|in:Active,Resolved,Expired',
            'issued_at' => 'required|date',
            'expires_at' => 'nullable|date|after:issued_at',
        ]);

        HazardAlert::create($validated);

        return redirect()
            ->route('hazard-alerts.index')
            ->with('success', 'Hazard alert created successfully.');
    }

    public function update(Request $request, HazardAlert $hazardAlert)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'hazard_type' => 'required|string|max:255',
            'severity' => 'required|in:Low,Moderate,High,Critical',
            'description' => 'required|string',
            'affected_area' => 'required|string|max:255',
            'status' => 'required|in:Active,Resolved,Expired',
            'issued_at' => 'required|date',
            'expires_at' => 'nullable|date|after:issued_at',
        ]);

        $hazardAlert->update($validated);

        return redirect()
            ->route('hazard-alerts.index')
            ->with('success', 'Hazard alert updated successfully.');
    }

    public function destroy(HazardAlert $hazardAlert)
    {
        $hazardAlert->delete();

        return redirect()
            ->route('hazard-alerts.index')
            ->with('success', 'Hazard alert deleted successfully.');
    }
}
