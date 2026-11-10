
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\EvacuationMonitoringController;
use App\Http\Controllers\EvacuationCenterController;
use App\Http\Controllers\RiskMonitoringController;
use App\Http\Controllers\HazardAlertController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingsController;


// =====================================================
// PUBLIC ROUTES
// =====================================================

Route::get('/', function () {
    return view('welcome');
});


// =====================================================
// HERMIS SYSTEM ROUTES
// =====================================================

Route::middleware('auth')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [
        DashboardController::class,
        'index'
    ])->name('dashboard');


    // HOUSEHOLD MANAGEMENT
    Route::get('/households', [
        HouseholdController::class,
        'index'
    ])->name('households.index');

    Route::get('/households/create', [
        HouseholdController::class,
        'create'
    ])->name('households.create');

    Route::post('/households', [
        HouseholdController::class,
        'store'
    ])->name('households.store');

    Route::get('/households/{household}', [
        HouseholdController::class,
        'show'
    ])->name('households.show');

    Route::get('/households/{household}/edit', [
        HouseholdController::class,
        'edit'
    ])->name('households.edit');

    Route::put('/households/{household}', [
        HouseholdController::class,
        'update'
    ])->name('households.update');

    Route::delete('/households/{household}', [
        HouseholdController::class,
        'destroy'
    ])->name('households.destroy');


    // EVACUATION MONITORING
    Route::get('/evacuation-monitoring', [
        EvacuationMonitoringController::class,
        'index'
    ])->name('evacuation-monitoring.index');

    Route::patch('/evacuation-monitoring/{household}/status', [
        EvacuationMonitoringController::class,
        'updateStatus'
    ])->name('evacuation-monitoring.update-status');


    // EVACUATION CENTERS
    Route::get('/evacuation-centers', [
        EvacuationCenterController::class,
        'index'
    ])->name('evacuation-centers.index');

    Route::post('/evacuation-centers', [
        EvacuationCenterController::class,
        'store'
    ])->name('evacuation-centers.store');

    Route::put('/evacuation-centers/{evacuationCenter}', [
        EvacuationCenterController::class,
        'update'
    ])->name('evacuation-centers.update');

    Route::delete('/evacuation-centers/{evacuationCenter}', [
        EvacuationCenterController::class,
        'destroy'
    ])->name('evacuation-centers.destroy');


    // RISK MONITORING
    Route::get('/risk-monitoring', [
        RiskMonitoringController::class,
        'index'
    ])->name('risk-monitoring.index');

    Route::post('/risk-monitoring/{household}/assessment', [
        RiskMonitoringController::class,
        'storeAssessment'
    ])->name('risk-monitoring.assessment');


    // HAZARD ALERTS AND WARNINGS
    Route::get('/hazard-alerts', [
        HazardAlertController::class,
        'index'
    ])->name('hazard-alerts.index');

    Route::post('/hazard-alerts', [
        HazardAlertController::class,
        'store'
    ])->name('hazard-alerts.store');

    Route::put('/hazard-alerts/{hazardAlert}', [
        HazardAlertController::class,
        'update'
    ])->name('hazard-alerts.update');

    Route::delete('/hazard-alerts/{hazardAlert}', [
        HazardAlertController::class,
        'destroy'
    ])->name('hazard-alerts.destroy');


    // REPORTS
    Route::get('/reports', [
        ReportController::class,
        'index'
    ])->name('reports.index');


    // SETTINGS
    Route::get('/settings', [
        SettingsController::class,
        'index'
    ])->name('settings.index');

    Route::patch('/settings/profile', [
        SettingsController::class,
        'updateProfile'
    ])->name('settings.profile.update');

    Route::put('/settings/password', [
        SettingsController::class,
        'updatePassword'
    ])->name('settings.password.update');


    // ABOUT
    Route::get('/about', function () {
        return view('about.index');
    })->name('about.index');


    // USER PROFILE
    Route::get('/profile', [
        ProfileController::class,
        'edit'
    ])->name('profile.edit');

    Route::patch('/profile', [
        ProfileController::class,
        'update'
    ])->name('profile.update');

    Route::delete('/profile', [
        ProfileController::class,
        'destroy'
    ])->name('profile.destroy');

});


// =====================================================
// AUTHENTICATION ROUTES
// =====================================================

require __DIR__.'/auth.php';
