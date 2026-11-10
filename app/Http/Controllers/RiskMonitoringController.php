<?php

namespace App\Http\Controllers;

use App\Models\Household;
use Illuminate\Http\Request;

class RiskMonitoringController extends Controller
{
    /**
     * Display the Risk Monitoring Dashboard.
     */
    public function index()
    {
        $households = Household::latest()->get();

        return view('risk-monitoring.index', compact('households'));
    }

    /**
     * Save Household Risk Assessment.
     */
    public function storeAssessment(Request $request, Household $household)
    {
        $validated = $request->validate([
            'hazard_exposure' => 'required|in:Low,Moderate,High',
            'distance_from_hazard' => 'required|in:Far,Moderate,Near',
            'vulnerable_members' => 'required|integer|min:0',
            'house_condition' => 'required|in:Good,Fair,Poor',
            'evacuation_accessibility' => 'required|in:Accessible,Limited,Difficult',
        ]);

        // Hazard Exposure Score
        $hazardScore = match ($validated['hazard_exposure']) {
            'Low' => 0,
            'Moderate' => 1,
            'High' => 2,
        };

        // Distance from Hazard Score
        $distanceScore = match ($validated['distance_from_hazard']) {
            'Far' => 0,
            'Moderate' => 1,
            'Near' => 2,
        };

        // Vulnerable Members Score
        $vulnerableScore = match (true) {
            $validated['vulnerable_members'] == 0 => 0,
            $validated['vulnerable_members'] <= 2 => 1,
            default => 2,
        };

        // House Condition Score
        $houseScore = match ($validated['house_condition']) {
            'Good' => 0,
            'Fair' => 1,
            'Poor' => 2,
        };

        // Evacuation Accessibility Score
        $accessibilityScore = match ($validated['evacuation_accessibility']) {
            'Accessible' => 0,
            'Limited' => 1,
            'Difficult' => 2,
        };

        // Calculate Total Risk Score
        $totalScore = $hazardScore
            + $distanceScore
            + $vulnerableScore
            + $houseScore
            + $accessibilityScore;

        // Determine Risk Level
        if ($totalScore >= 7) {
            $riskLevel = 'High';
        } elseif ($totalScore >= 4) {
            $riskLevel = 'Moderate';
        } else {
            $riskLevel = 'Low';
        }

        // Save Assessment Results
        $household->update([
            'hazard_exposure' => $validated['hazard_exposure'],
            'distance_from_hazard' => $validated['distance_from_hazard'],
            'vulnerable_members' => $validated['vulnerable_members'],
            'house_condition' => $validated['house_condition'],
            'evacuation_accessibility' => $validated['evacuation_accessibility'],
            'risk_score' => $totalScore,
            'risk_level' => $riskLevel,
            'risk_assessed_at' => now(),
        ]);

        return redirect()
            ->route('risk-monitoring.index')
            ->with('success', 'Household risk assessment saved successfully!');
    }
}
