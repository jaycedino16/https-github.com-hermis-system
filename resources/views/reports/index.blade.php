<x-app-layout>
    <div class="min-h-screen bg-slate-100 text-slate-800">
        <div class="p-0">
                <!-- Formal document heading (print only) -->
                <div class="print-document-header">
                    <div class="print-government-heading">
                        <p>REPUBLIC OF THE PHILIPPINES</p>
                        <p>PROVINCE OF ALBAY</p>
                        <p>MUNICIPALITY OF CAMALIG</p>
                        <h1>BARANGAY ANOLING</h1>
                        <p class="print-office-label">BARANGAY GOVERNMENT</p>
                    </div>
                    <div class="print-document-rule"></div>
                    <h2 class="print-system-name">HOUSEHOLD EVACUATION AND RISK MANAGEMENT INFORMATION SYSTEM</h2>
                    <h3>CONSOLIDATED SYSTEM REPORT</h3>
                    <p class="print-report-subtitle">Household Records • Risk Assessment • Evacuation Monitoring • Evacuation Centers</p>
                    <div class="print-document-meta">
                        <span><strong>Report Date:</strong> {{ now()->format('F d, Y') }}</span>
                        <span><strong>Time Generated:</strong> {{ now()->format('h:i A') }}</span>
                        <span><strong>Record Basis:</strong> Data currently stored in HERMIS</span>
                    </div>
                </div>

                <!-- Page Heading: same banner treatment as HERMIS Dashboard -->
                <section class="screen-page-header relative isolate mb-4 min-h-[150px] overflow-hidden rounded-2xl border border-slate-200 bg-gradient-to-r from-white via-slate-50 to-orange-50 px-6 py-6 shadow-sm sm:px-7">
                    <div class="pointer-events-none absolute inset-y-0 right-0 w-[58%] opacity-90" aria-hidden="true">
                        <svg class="h-full w-full" viewBox="0 0 900 220" preserveAspectRatio="xMidYMid slice" fill="none">
                            <path d="M250 220 470 78l85 62 105-93 240 173H250Z" fill="#CBD5E1" opacity=".45"/>
                            <path d="m410 220 180-150 82 68 74-48 154 130H410Z" fill="#94A3B8" opacity=".28"/>
                            <path d="m540 220 150-125 74 64 52-31 84 92H540Z" fill="#64748B" opacity=".16"/>
                            <path d="M610 0h290v220H790c-22-45-63-85-118-115-23-13-43-28-62-45Z" fill="#EA580C" opacity=".10"/>
                            <path d="M700 0h200v220h-68c-22-54-70-102-132-137Z" fill="#EA580C" opacity=".10"/>
                            <path d="M0 218h900" stroke="#EA580C" stroke-opacity=".22" stroke-width="3"/>
                        </svg>
                    </div>
                    <div class="pointer-events-none absolute -right-12 -top-20 h-56 w-56 rounded-full bg-[#EA580C]/10 blur-3xl"></div>

                    <div class="relative flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
                        <div>
                            <p class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.18em] text-[#EA580C]">
                                <span class="h-2 w-2 rounded-full bg-[#EA580C] shadow-[0_0_0_4px_rgba(234,88,12,0.12)]"></span>
                                Reports / Consolidated Reports
                            </p>
                            <h1 class="mt-1 text-3xl font-extrabold tracking-tight text-[#0F172A] sm:text-4xl">
                                Reports
                            </h1>
                            <p class="mt-2 text-sm text-slate-500">
                                Generate and review household, risk assessment, evacuation, and evacuation center reports.
                            </p>
                        </div>

                        <button onclick="window.print()"
                            class="no-print inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-[#EA580C] px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-[#C2410C] focus:outline-none focus:ring-2 focus:ring-orange-300 focus:ring-offset-2">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9V2h12v7"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><path d="M6 14h12v8H6z"/></svg>
                            Print Report
                        </button>
                    </div>
                </section>

                <!-- Summary Cards: same navy gradient and orange icon treatment as Dashboard -->
                <div class="report-overview-grid grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4 mb-4">

                    <!-- Total Households -->
                    <div class="report-overview-card relative min-h-[132px] overflow-hidden rounded-2xl border border-slate-700/70 p-4 text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%);color:#FFFFFF;">
                        <div class="flex items-center justify-between gap-3">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 10.5 12 3l9 7.5"/><path d="M5 9v12h14V9"/><path d="M9 21v-7h6v7"/></svg>
                            </span>
                            <span class="rounded-full border border-white/15 bg-white/10 px-3 py-1 text-[11px] font-bold uppercase tracking-wide text-slate-100">Households</span>
                        </div>
                        <p class="print-card-label mt-3 text-sm font-semibold text-slate-200">Total Households</p>
                        <h3 class="mt-1 text-3xl font-extrabold text-white">{{ number_format($totalHouseholds) }}</h3>
                        <p class="mt-1 text-xs text-slate-300">Registered households</p>
                    </div>

                    <!-- Total Residents -->
                    <div class="report-overview-card relative min-h-[132px] overflow-hidden rounded-2xl border border-slate-700/70 p-4 text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%);color:#FFFFFF;">
                        <div class="flex items-center justify-between gap-3">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="8" r="3"/><path d="M3 21v-2a6 6 0 0 1 12 0v2"/><path d="M16 5.5a3 3 0 0 1 0 5.8M18 15a5 5 0 0 1 3 4.6V21"/></svg>
                            </span>
                            <span class="rounded-full border border-white/15 bg-white/10 px-3 py-1 text-[11px] font-bold uppercase tracking-wide text-slate-100">Residents</span>
                        </div>
                        <p class="print-card-label mt-3 text-sm font-semibold text-slate-200">Total Residents</p>
                        <h3 class="mt-1 text-3xl font-extrabold text-white">{{ number_format($totalResidents) }}</h3>
                        <p class="mt-1 text-xs text-slate-300">Registered individuals</p>
                    </div>

                    <!-- Evacuated Households -->
                    <div class="report-overview-card relative min-h-[132px] overflow-hidden rounded-2xl border border-slate-700/70 p-4 text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%);color:#FFFFFF;">
                        <div class="flex items-center justify-between gap-3">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 10.5 12 3l9 7.5"/><path d="M5 9v12h14V9"/><path d="m9 14 2 2 4-4"/></svg>
                            </span>
                            <span class="rounded-full border border-white/15 bg-white/10 px-3 py-1 text-[11px] font-bold uppercase tracking-wide text-slate-100">Evacuated</span>
                        </div>
                        <p class="print-card-label mt-3 text-sm font-semibold text-slate-200">Evacuated Households</p>
                        <h3 class="mt-1 text-3xl font-extrabold text-white">{{ number_format($totalEvacuated) }}</h3>
                        <p class="mt-1 text-xs text-slate-300">Households already evacuated</p>
                    </div>

                    <!-- Total Evacuees -->
                    <div class="report-overview-card relative min-h-[132px] overflow-hidden rounded-2xl border border-slate-700/70 p-4 text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%);color:#FFFFFF;">
                        <div class="flex items-center justify-between gap-3">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="8" r="3"/><path d="M3 21v-2a6 6 0 0 1 12 0v2"/><path d="M16 8h5m-2.5-2.5v5"/></svg>
                            </span>
                            <span class="rounded-full border border-white/15 bg-white/10 px-3 py-1 text-[11px] font-bold uppercase tracking-wide text-slate-100">Evacuees</span>
                        </div>
                        <p class="print-card-label mt-3 text-sm font-semibold text-slate-200">Total Evacuees</p>
                        <h3 class="mt-1 text-3xl font-extrabold text-white">{{ number_format($totalEvacuees) }}</h3>
                        <p class="mt-1 text-xs text-slate-300">Individuals currently evacuated</p>
                    </div>

                </div>

                <!-- 1. Household Report -->
                <section class="report-section mb-5 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-200 px-5 py-4">
                        <h3 class="text-base font-bold text-slate-900">
                            1. Household Report
                        </h3>

                        <p class="mt-1 text-xs text-slate-500">
                            Registered households and resident information.
                        </p>
                    </div>

                    <div class="px-5 py-4">

                        <!-- Household Summary -->
                        <div class="report-summary-grid grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

                            <div class="report-summary-card bg-gray-50 rounded-lg p-4">
                                <p class="print-card-label text-sm text-gray-500">Total Households</p>
                                <p class="text-2xl font-bold mt-1">
                                    {{ number_format($totalHouseholds) }}
                                </p>
                            </div>

                            <div class="report-summary-card bg-gray-50 rounded-lg p-4">
                                <p class="print-card-label text-sm text-gray-500">Total Residents</p>
                                <p class="text-2xl font-bold mt-1">
                                    {{ number_format($totalResidents) }}
                                </p>
                            </div>

                            <div class="report-summary-card bg-gray-50 rounded-lg p-4">
                                <p class="print-card-label text-sm text-gray-500">Average Members</p>
                                <p class="text-2xl font-bold mt-1">
                                    {{ $totalHouseholds > 0 ? number_format($totalResidents / $totalHouseholds, 1) : '0.0' }}
                                </p>
                            </div>

                        </div>

                        <!-- Household Table -->
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left">

                                <thead class="bg-[#0F172A] text-white uppercase tracking-wider text-xs">
                                    <tr>
                                        <th class="px-4 py-2.5">No.</th>
                                        <th class="px-4 py-2.5">Household Head</th>
                                        <th class="px-4 py-2.5">Purok</th>
                                        <th class="px-4 py-2.5">Members</th>
                                        <th class="px-4 py-2.5">Risk Level</th>
                                        <th class="px-4 py-2.5">Status</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-100">

                                    @forelse($households as $index => $household)

                                        <tr>
                                            <td class="px-4 py-2.5">{{ $index + 1 }}</td>

                                            <td class="px-4 py-3 font-semibold">
                                                {{ $household->household_head }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ $household->purok ?? '—' }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ number_format($household->members) }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ $household->risk_level ?? 'Not Assessed' }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ $household->status ?? '—' }}
                                            </td>
                                        </tr>

                                    @empty

                                        <tr>
                                            <td colspan="6" class="px-4 py-8 text-center text-gray-400">
                                                No household records found.
                                            </td>
                                        </tr>

                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                    </div>
                </section>

                <!-- 2. Risk Assessment Report -->
                <section class="report-section mb-5 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-200 px-5 py-4">
                        <h3 class="text-base font-bold text-slate-900">
                            2. Risk Assessment Report
                        </h3>

                        <p class="mt-1 text-xs text-slate-500">
                            Households grouped according to their recorded risk level.
                        </p>
                    </div>

                    <div class="px-5 py-4">

                        <!-- Risk Summary -->
                        <div class="report-summary-grid grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

                            <div class="report-summary-card bg-green-50 rounded-lg p-5">
                                <p class="print-card-label text-sm text-green-700">Low Risk</p>
                                <h4 class="text-3xl font-bold text-green-700 mt-2">
                                    {{ number_format($lowRisk) }}
                                </h4>
                            </div>

                            <div class="report-summary-card bg-orange-50 rounded-lg p-5">
                                <p class="print-card-label text-sm text-orange-700">Moderate Risk</p>
                                <h4 class="text-3xl font-bold text-orange-700 mt-2">
                                    {{ number_format($moderateRisk) }}
                                </h4>
                            </div>

                            <div class="report-summary-card bg-red-50 rounded-lg p-5">
                                <p class="print-card-label text-sm text-red-700">High Risk</p>
                                <h4 class="text-3xl font-bold text-red-700 mt-2">
                                    {{ number_format($highRisk) }}
                                </h4>
                            </div>

                        </div>

                        <!-- Risk Table -->
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left">

                                <thead class="bg-[#0F172A] text-white uppercase tracking-wider text-xs">
                                    <tr>
                                        <th class="px-4 py-2.5">No.</th>
                                        <th class="px-4 py-2.5">Household Head</th>
                                        <th class="px-4 py-2.5">Purok</th>
                                        <th class="px-4 py-2.5">Risk Level</th>
                                        <th class="px-4 py-2.5">Risk Score</th>
                                        <th class="px-4 py-2.5">Date Assessed</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-100">

                                    @forelse($households as $index => $household)

                                        <tr>
                                            <td class="px-4 py-2.5">{{ $index + 1 }}</td>

                                            <td class="px-4 py-3 font-semibold">
                                                {{ $household->household_head }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ $household->purok ?? '—' }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ $household->risk_level ?? 'Not Assessed' }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ $household->risk_score ?? '—' }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ $household->risk_assessed_at?->format('M d, Y') ?? '—' }}
                                            </td>
                                        </tr>

                                    @empty

                                        <tr>
                                            <td colspan="6" class="px-4 py-8 text-center text-gray-400">
                                                No risk assessment records found.
                                            </td>
                                        </tr>

                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                    </div>
                </section>

                <!-- 3. Evacuation Report -->
                <section class="report-section mb-5 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-200 px-5 py-4">
                        <h3 class="text-base font-bold text-slate-900">
                            3. Evacuation Report
                        </h3>

                        <p class="mt-1 text-xs text-slate-500">
                            Evacuation status, evacuees, and recorded evacuation centers.
                        </p>
                    </div>

                    <div class="px-5 py-4">

                        <!-- Evacuation Summary -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">

                            <div class="report-summary-card bg-green-50 rounded-lg p-4">
                                <p class="text-sm text-green-700">Evacuated Households</p>
                                <h4 class="text-2xl font-bold text-green-700 mt-2">
                                    {{ number_format($totalEvacuated) }}
                                </h4>
                            </div>

                            <div class="report-summary-card bg-blue-50 rounded-lg p-4">
                                <p class="text-sm text-blue-700">Total Evacuees</p>
                                <h4 class="text-2xl font-bold text-blue-700 mt-2">
                                    {{ number_format($totalEvacuees) }}
                                </h4>
                            </div>

                            <div class="report-summary-card bg-orange-50 rounded-lg p-4">
                                <p class="print-card-label text-sm text-orange-700">For Evacuation</p>
                                <h4 class="text-2xl font-bold text-orange-700 mt-2">
                                    {{ number_format($totalForEvacuation) }}
                                </h4>
                            </div>

                            <div class="report-summary-card bg-gray-100 rounded-lg p-4">
                                <p class="print-card-label text-sm text-gray-600">Returned Home</p>
                                <h4 class="text-2xl font-bold text-gray-700 mt-2">
                                    {{ number_format($totalReturnedHome) }}
                                </h4>
                            </div>

                        </div>

                        <!-- Evacuation Table -->
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left">

                                <thead class="bg-[#0F172A] text-white uppercase tracking-wider text-xs">
                                    <tr>
                                        <th class="px-4 py-2.5">No.</th>
                                        <th class="px-4 py-2.5">Household Head</th>
                                        <th class="px-4 py-2.5">Purok</th>
                                        <th class="px-4 py-2.5">Evacuation Center</th>
                                        <th class="px-4 py-2.5">Evacuees</th>
                                        <th class="px-4 py-2.5">Status</th>
                                        <th class="px-4 py-2.5">Date Recorded</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-100">

                                    @forelse($evacuations as $index => $evacuation)

                                        <tr>
                                            <td class="px-4 py-2.5">{{ $index + 1 }}</td>

                                            <td class="px-4 py-3 font-semibold">
                                                {{ $evacuation->household?->household_head ?? 'Household not found' }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ $evacuation->household?->purok ?? '—' }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ $evacuation->evacuation_center ?? '—' }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ number_format($evacuation->evacuees_count) }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ $evacuation->evacuation_status }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ $evacuation->updated_at?->format('M d, Y h:i A') ?? '—' }}
                                            </td>
                                        </tr>

                                    @empty

                                        <tr>
                                            <td colspan="7" class="px-4 py-8 text-center text-gray-400">
                                                No evacuation records found.
                                            </td>
                                        </tr>

                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                    </div>
                </section>

                <!-- 4. Evacuation Center Report -->
                <section class="report-section mb-5 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-200 px-5 py-4">
                        <h3 class="text-base font-bold text-slate-900">
                            4. Evacuation Center Report
                        </h3>

                        <p class="mt-1 text-xs text-slate-500">
                            Center capacity, current occupants, and available slots.
                        </p>
                    </div>

                    <div class="px-5 py-4">

                        <!-- Center Summary -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">

                            <div class="report-summary-card bg-gray-50 rounded-lg p-4">
                                <p class="print-card-label text-sm text-gray-500">Active Centers</p>
                                <h4 class="text-2xl font-bold mt-2">
                                    {{ number_format($activeCenters) }}
                                </h4>
                            </div>

                            <div class="report-summary-card bg-gray-50 rounded-lg p-4">
                                <p class="print-card-label text-sm text-gray-500">Total Capacity</p>
                                <h4 class="text-2xl font-bold mt-2">
                                    {{ number_format($totalCapacity) }}
                                </h4>
                            </div>

                            <div class="report-summary-card bg-blue-50 rounded-lg p-4">
                                <p class="print-card-label text-sm text-blue-700">Current Occupants</p>
                                <h4 class="text-2xl font-bold text-blue-700 mt-2">
                                    {{ number_format($totalCurrentOccupants) }}
                                </h4>
                            </div>

                            <div class="report-summary-card bg-green-50 rounded-lg p-4">
                                <p class="print-card-label text-sm text-green-700">Available Slots</p>
                                <h4 class="text-2xl font-bold text-green-700 mt-2">
                                    {{ number_format($totalAvailableSlots) }}
                                </h4>
                            </div>

                        </div>

                        <!-- Evacuation Center Table -->
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left">

                                <thead class="bg-[#0F172A] text-white uppercase tracking-wider text-xs">
                                    <tr>
                                        <th class="px-4 py-2.5">No.</th>
                                        <th class="px-4 py-2.5">Center Name</th>
                                        <th class="px-4 py-2.5">Address</th>
                                        <th class="px-4 py-2.5">Capacity</th>
                                        <th class="px-4 py-2.5">Current Occupants</th>
                                        <th class="px-4 py-2.5">Available Slots</th>
                                        <th class="px-4 py-2.5">Status</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-100">

                                    @forelse($evacuationCenters as $index => $center)

                                        <tr>
                                            <td class="px-4 py-2.5">{{ $index + 1 }}</td>

                                            <td class="px-4 py-3 font-semibold">
                                                {{ $center->center_name }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ $center->address }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ number_format($center->capacity) }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ number_format($center->current_occupants) }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ number_format($center->available_slots) }}
                                            </td>

                                            <td class="px-4 py-2.5">
                                                {{ $center->status }}
                                            </td>
                                        </tr>

                                    @empty

                                        <tr>
                                            <td colspan="7" class="px-4 py-8 text-center text-gray-400">
                                                No evacuation centers found.
                                            </td>
                                        </tr>

                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                    </div>
                </section>

                <!-- Print-only document sign-off area -->
                <div class="print-signoff">
                    <div>
                        <span class="print-sign-line"></span>
                        <strong>Prepared by</strong>
                        <small>HERMIS Administrator</small>
                    </div>
                    <div>
                        <span class="print-sign-line"></span>
                        <strong>Reviewed by</strong>
                        <small>Authorized Barangay Personnel</small>
                    </div>
                    <div>
                        <span class="print-sign-line"></span>
                        <strong>Noted by</strong>
                        <small>Barangay Official</small>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center text-sm text-gray-400 mt-10 mb-4">
                    HERMIS - Household Evacuation and Risk Management Information System

                    <p class="mt-1">
                        Generated on {{ now()->format('F d, Y h:i A') }}
                    </p>
                </div>

            </main>
        </div>
    </div>

    <!-- Screen and Print Styles -->
    <style>
        /* HERMIS screen UI: matched to Dashboard V4. */
        .screen-page-header { min-height: 150px; margin-bottom: 1rem !important; }
        .report-overview-grid { gap: 1rem !important; margin-bottom: 1rem !important; }
        .report-overview-card { min-height: 132px !important; padding: 1rem !important; }
        .report-section {
            margin-bottom: 1rem !important;
            border-radius: 1rem !important;
            box-shadow: 0 4px 18px rgba(15, 23, 42, .06) !important;
        }
        .report-section > div:first-child {
            padding: 1rem 1.25rem !important;
            border-left: 4px solid #EA580C !important;
            background: linear-gradient(90deg, #FFFFFF 0%, #FFFFFF 72%, rgba(255,237,213,.45) 100%) !important;
        }
        .report-section > div:first-child h3 { color: #0F172A !important; }
        .report-section > div:nth-child(2) { padding: 1rem 1.25rem !important; }
        .report-section table { border-collapse: collapse; }
        .report-section table thead { background: #0F172A !important; }
        .report-section table thead th {
            padding: .7rem .9rem !important;
            background: #0F172A !important;
            color: #FFFFFF !important;
            font-size: 11px !important;
            font-weight: 700 !important;
            letter-spacing: .06em !important;
        }
        .report-section table tbody td { padding: .65rem .9rem !important; }
        .report-section table tbody tr { transition: background-color .15s ease; }
        .report-section table tbody tr:hover { background: #F8FAFC; }
        .report-summary-grid {
            display: grid !important;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: .85rem !important;
            margin-bottom: 1rem !important;
        }
        .report-summary-card {
            min-width: 0;
            min-height: 84px;
            padding: 1rem !important;
            border: 1px solid #E2E8F0 !important;
            border-radius: .75rem !important;
        }
        @media (max-width: 767px) {
            .report-overview-grid { grid-template-columns: 1fr !important; }
            .report-summary-grid { grid-template-columns: 1fr; }
            .report-section > div:first-child,
            .report-section > div:nth-child(2) { padding-left: 1rem !important; padding-right: 1rem !important; }
        }

        .print-document-header,
        .print-signoff {
            display: none;
        }

        @media print {
            @page {
                size: A4 landscape;
                margin: 12mm 14mm;
            }

            html, body {
                width: 100% !important;
                min-height: 0 !important;
                margin: 0 !important;
                padding: 0 !important;
                background: #ffffff !important;
                color: #111827 !important;
                font-family: Arial, Helvetica, sans-serif !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            header, aside, .no-print, .screen-page-header {
                display: none !important;
            }

            .min-h-screen, .flex {
                min-height: 0 !important;
            }

            main {
                display: block !important;
                width: 100% !important;
                max-width: none !important;
                margin: 0 !important;
                padding: 0 !important;
                background: #ffffff !important;
            }

            .print-document-header {
                display: block !important;
                text-align: center !important;
                margin: 0 0 12px !important;
                padding: 0 0 8px !important;
                color: #111827 !important;
                border-bottom: 2px solid #111827 !important;
                font-family: Georgia, "Times New Roman", serif !important;
                page-break-after: avoid !important;
                break-after: avoid !important;
            }

            .print-government-heading p {
                margin: 0 0 1px !important;
                font-family: Arial, Helvetica, sans-serif !important;
                font-size: 9pt !important;
                line-height: 1.25 !important;
                letter-spacing: .45px !important;
                color: #111827 !important;
            }

            .print-government-heading h1 {
                margin: 2px 0 1px !important;
                font-family: Georgia, "Times New Roman", serif !important;
                font-size: 17pt !important;
                line-height: 1.15 !important;
                font-weight: 700 !important;
                letter-spacing: 1px !important;
            }

            .print-government-heading .print-office-label {
                font-size: 8pt !important;
                font-weight: 700 !important;
                letter-spacing: 1.1px !important;
            }

            .print-document-rule {
                display: block !important;
                height: 1px !important;
                background: #9ca3af !important;
                margin: 6px 0 !important;
            }

            .print-document-header .print-system-name {
                font-family: Arial, Helvetica, sans-serif !important;
                font-size: 9pt !important;
                line-height: 1.25 !important;
                font-weight: 700 !important;
                letter-spacing: .25px !important;
                margin: 0 0 4px !important;
            }

            .print-document-header h3 {
                font-family: Arial, Helvetica, sans-serif !important;
                font-size: 14pt !important;
                font-weight: 700 !important;
                letter-spacing: .8px !important;
                margin: 0 0 3px !important;
            }

            .print-report-subtitle {
                margin: 0 0 6px !important;
                font-family: Arial, Helvetica, sans-serif !important;
                font-size: 8pt !important;
                color: #374151 !important;
            }

            .print-document-meta {
                display: flex !important;
                justify-content: space-between !important;
                gap: 12px !important;
                border-top: 1px solid #d1d5db !important;
                padding-top: 5px !important;
                font-family: Arial, Helvetica, sans-serif !important;
                font-size: 8pt !important;
                line-height: 1.35 !important;
                color: #111827 !important;
                text-align: left !important;
            }

            .print-document-meta span {
                flex: 1 1 0 !important;
            }

            .print-signoff {
                display: grid !important;
                grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
                gap: 28px !important;
                margin: 24px 4px 16px !important;
                padding-top: 10px !important;
                border-top: 1px solid #9ca3af !important;
                page-break-inside: avoid !important;
                break-inside: avoid !important;
                font-family: Arial, Helvetica, sans-serif !important;
                font-size: 8pt !important;
                color: #111827 !important;
            }

            .print-signoff > div {
                display: flex !important;
                flex-direction: column !important;
                align-items: center !important;
                text-align: center !important;
            }

            .print-sign-line {
                display: block !important;
                width: 78% !important;
                border-top: 1px solid #374151 !important;
                margin: 24px 0 5px !important;
            }

            .print-signoff small {
                margin-top: 2px !important;
                font-size: 7pt !important;
                color: #4b5563 !important;
            }

            main > div:first-child:not(.print-document-header) {
                margin: 0 0 9px !important;
                display: block !important;
            }

            main > div:first-child:not(.print-document-header) h2 {
                display: none !important;
            }

            main > div:first-child:not(.print-document-header) p {
                display: none !important;
            }

            .report-overview-grid {
                display: grid !important;
                grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
                gap: 7px !important;
                margin: 0 0 10px !important;
            }

            .report-overview-card {
                padding: 9px 10px !important;
                border: 1px solid #9ca3af !important;
                border-radius: 0 !important;
                box-shadow: none !important;
                background: #ffffff !important;
                break-inside: avoid !important;
            }

            .report-overview-card p,
            .report-overview-card p:first-child,
            .report-overview-card p:last-child {
                display: block !important;
                visibility: visible !important;
                font-size: 8pt !important;
                line-height: 1.2 !important;
                color: #374151 !important;
                margin: 0 0 3px !important;
            }

            .report-overview-card p:last-child {
                margin: 2px 0 0 !important;
                font-size: 7.5pt !important;
                color: #6b7280 !important;
            }

            .report-overview-card h3 {
                font-size: 15pt !important;
                margin: 2px 0 !important;
                color: #111827 !important;
            }

            .report-section {
                width: 100% !important;
                margin: 0 !important;
                border: 0 !important;
                border-radius: 0 !important;
                box-shadow: none !important;
                background: #ffffff !important;
                break-inside: auto !important;
                page-break-inside: auto !important;
            }

            .report-section.print-page-start {
                break-before: auto !important;
                page-break-before: auto !important;
            }

            .report-section > div:first-child {
                padding: 0 0 6px !important;
                margin: 0 0 8px !important;
                background: #ffffff !important;
                border: 0 !important;
                border-bottom: 1px solid #6b7280 !important;
            }

            .report-section > div:first-child h3 {
                font-size: 12pt !important;
                line-height: 1.2 !important;
                color: #111827 !important;
                font-weight: 700 !important;
            }

            .report-section > div:first-child p {
                font-size: 8pt !important;
                margin-top: 2px !important;
                color: #374151 !important;
            }

            .report-section > div:nth-child(2) {
                padding: 0 !important;
            }

            .report-summary-grid {
                display: grid !important;
                grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
                gap: 8px !important;
                margin: 0 0 12px !important;
            }

            .report-section .grid.grid-cols-1.sm\\:grid-cols-2.xl\\:grid-cols-4 {
                display: grid !important;
                grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
                gap: 8px !important;
                margin: 0 0 12px !important;
            }

            .report-summary-card {
                min-height: 0 !important;
                padding: 7px 9px !important;
                border: 1px solid #9ca3af !important;
                border-radius: 0 !important;
                background: #ffffff !important;
                break-inside: avoid !important;
            }

            .report-summary-card p {
                display: block !important;
                visibility: visible !important;
                font-size: 8pt !important;
                line-height: 1.25 !important;
                color: #374151 !important;
                margin: 0 0 3px !important;
            }

            .report-summary-card h4,
            .report-summary-card .text-2xl,
            .report-summary-card .text-3xl {
                font-size: 13pt !important;
                margin-top: 2px !important;
                color: #111827 !important;
            }


            .print-card-label,
            .report-overview-card .print-card-label,
            .report-summary-card .print-card-label {
                display: block !important;
                visibility: visible !important;
                opacity: 1 !important;
                height: auto !important;
                overflow: visible !important;
                font-family: Arial, Helvetica, sans-serif !important;
                font-size: 8pt !important;
                line-height: 1.25 !important;
                font-weight: 600 !important;
                color: #374151 !important;
                margin: 0 0 4px !important;
                white-space: normal !important;
            }

            .report-overview-card,
            .report-summary-card {
                display: block !important;
                min-height: 0 !important;
                padding: 8px 10px !important;
                border: 1px solid #9ca3af !important;
                border-radius: 2px !important;
                background: #ffffff !important;
                box-shadow: none !important;
            }

            .report-overview-card h3,
            .report-summary-card h4 {
                display: block !important;
                font-size: 14pt !important;
                line-height: 1.15 !important;
                margin: 2px 0 0 !important;
                color: #111827 !important;
            }

            .report-section {
                break-inside: avoid !important;
                page-break-inside: avoid !important;
                margin: 0 0 14px !important;
            }

            .report-section > div:first-child,
            .report-section .report-summary-grid,
            .report-section .overflow-x-auto {
                break-inside: avoid !important;
                page-break-inside: avoid !important;
            }
\n            .overflow-x-auto {
                overflow: visible !important;
            }

            table {
                width: 100% !important;
                border-collapse: collapse !important;
                table-layout: auto !important;
                font-size: 8.5pt !important;
                color: #111827 !important;
                font-family: Arial, Helvetica, sans-serif !important;
            }

            thead {
                display: table-header-group !important;
            }

            tr {
                break-inside: avoid !important;
                page-break-inside: avoid !important;
            }

            th, td {
                padding: 5px 7px !important;
                border: 1px solid #9ca3af !important;
                color: #111827 !important;
                vertical-align: middle !important;
                overflow-wrap: anywhere;
                background: #ffffff !important;
            }

            th {
                background: #f3f4f6 !important;
                font-size: 7.5pt !important;
                font-weight: 700 !important;
                text-transform: uppercase !important;
            }

            .report-section p,
            .report-section h4 {
                line-height: 1.25 !important;
            }

            main > div:last-child {
                margin: 8px 0 0 !important;
                padding-top: 6px !important;
                border-top: 1px solid #6b7280 !important;
                font-size: 7.5pt !important;
                letter-spacing: .15px !important;
                color: #374151 !important;
                text-align: center !important;
                break-inside: avoid !important;
                page-break-inside: avoid !important;
            }
        }
    </style>


</x-app-layout>
