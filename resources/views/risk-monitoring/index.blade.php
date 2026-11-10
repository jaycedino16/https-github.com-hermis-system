<x-app-layout>

<style>

        .risk-distribution-grid {

            display: grid;

            grid-template-columns: repeat(3, minmax(0, 1fr));

            gap: 1.25rem;

        }

        .risk-search-grid {

            display: grid;

            grid-template-columns: minmax(260px, 2fr) minmax(170px, 1fr) 112px 48px;

            gap: 0.75rem;

            align-items: end;

        }

        .risk-search-control {

            height: 42px;

            width: 100%;

            box-sizing: border-box;

        }

        @media (max-width: 767px) {

            .risk-search-grid { grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); }

            .risk-search-name { grid-column: 1 / -1; }

        }

        @media (max-width: 520px) {

            .risk-distribution-grid { gap: 0.75rem; }

            .risk-search-grid { grid-template-columns: minmax(0, 1fr); }

            .risk-search-name { grid-column: auto; }

        }

</style>

@php

    $households = $households ?? collect();

    $totalHouseholds = $households->count();

    $highRisk = $households->where('risk_level', 'High')->count();

    $moderateRisk = $households->where('risk_level', 'Moderate')->count();

    $lowRisk = $households->where('risk_level', 'Low')->count();

    $assessedCount = $households->filter(fn($h) => $h->risk_assessed_at !== null)->count();

    $pendingCount = $totalHouseholds - $assessedCount;

    $highPercent = $totalHouseholds > 0 ? ($highRisk / $totalHouseholds) * 100 : 0;

    $moderatePercent = $totalHouseholds > 0 ? ($moderateRisk / $totalHouseholds) * 100 : 0;

    $lowPercent = $totalHouseholds > 0 ? ($lowRisk / $totalHouseholds) * 100 : 0;

@endphp

<div class="mx-auto max-w-[1600px] space-y-7 px-1 pb-10">

    <section class="space-y-7">

            {{-- PAGE HEADER: SAME STYLE AS HERMIS DASHBOARD --}}
        <section class="relative isolate min-h-[150px] overflow-hidden rounded-2xl border border-slate-200 bg-gradient-to-r from-white via-slate-50 to-orange-50 px-6 py-6 shadow-sm sm:px-7">
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
                        Monitoring
                    </p>
                    <h1 class="mt-1 text-3xl font-extrabold tracking-tight text-[#0F172A] sm:text-4xl">
                        Risk Assessment Overview
                    </h1>
                    <p class="mt-2 text-sm text-slate-500">
                        Monitor household risk levels and identify communities that may need priority assistance.
                    </p>
                </div>
            </div>
        </section>

        <!-- SUCCESS MESSAGE -->

            @if (session('success'))

                <div class="mb-5 bg-green-50 border border-green-200 text-green-700 px-5 py-3 rounded-lg text-sm">

                    {{ session('success') }}

                </div>

            @endif

            <!-- VALIDATION ERRORS -->

            @if ($errors->any())

                <div class="mb-5 bg-red-50 border border-red-200 text-red-700 px-5 py-3 rounded-lg">

                    <p class="font-semibold text-sm mb-2">

                        Please check the following:

                    </p>

                    <ul class="list-disc pl-5 text-sm">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <!-- SUMMARY CARDS -->

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">

                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]">

                    <div class="flex items-center justify-between gap-3">

                        <div>

                            <p class="text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">Total Households</p>

                            <h3 class="mt-1 text-3xl font-extrabold text-white" style="color:#FFFFFF !important;">{{ $totalHouseholds }}</h3>

                            <p class="mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Registered households</p>

                        </div>

                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">

                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 10.5 12 3l9 7.5"/><path d="M5 9.5V21h14V9.5"/><path d="M9 21v-7h6v7"/></svg>

                        </span>

                    </div>

                </div>

                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]">

                    <div class="flex items-center justify-between gap-3">

                        <div>

                            <p class="text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">High Risk</p>

                            <h3 class="mt-1 text-3xl font-extrabold text-white" style="color:#FFFFFF !important;">{{ $highRisk }}</h3>

                            <p class="mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Priority attention</p>

                        </div>

                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">

                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m10.3 3.9-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.7-3.1l-8-14a2 2 0 0 0-3.4 0Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>

                        </span>

                    </div>

                </div>

                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]">

                    <div class="flex items-center justify-between gap-3">

                        <div>

                            <p class="text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">Moderate Risk</p>

                            <h3 class="mt-1 text-3xl font-extrabold text-white" style="color:#FFFFFF !important;">{{ $moderateRisk }}</h3>

                            <p class="mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Requires monitoring</p>

                        </div>

                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">

                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>

                        </span>

                    </div>

                </div>

                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]">

                    <div class="flex items-center justify-between gap-3">

                        <div>

                            <p class="text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">Low Risk</p>

                            <h3 class="mt-1 text-3xl font-extrabold text-white" style="color:#FFFFFF !important;">{{ $lowRisk }}</h3>

                            <p class="mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Lower recorded risk</p>

                        </div>

                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">

                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 7 10 17l-5-5"/><path d="M21 12a9 9 0 1 1-5.9-8.5"/></svg>

                        </span>

                    </div>

                </div>

            </div>

            <!-- HOUSEHOLD RISK DISTRIBUTION -->

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm mb-6">

                <div class="px-5 py-4 border-b border-slate-200">

                    <h3 class="text-base font-bold text-slate-900">

                        Household Risk Distribution

                    </h3>

                    <p class="text-xs text-slate-300 mt-1">

                        Overview of household risk classifications.

                    </p>

                </div>

                <div class="px-5 py-4">

                    <!-- THREE COMPACT COLUMNS -->

                    <div class="risk-distribution-grid">

                        <!-- HIGH RISK -->

                        <div>

                            <p class="text-xs font-medium text-red-600">

                                High Risk

                            </p>

                            <h3 class="text-2xl font-semibold text-red-600 mt-2">

                                {{ $highRisk }}

                            </h3>

                            <p class="text-xs text-slate-500 mt-3">

                                {{ number_format($highPercent, 1) }}%

                            </p>

                        </div>

                        <!-- MODERATE RISK -->

                        <div>

                            <p class="text-xs font-medium text-orange-700">

                                Moderate Risk

                            </p>

                            <h3 class="text-2xl font-semibold text-orange-700 mt-2">

                                {{ $moderateRisk }}

                            </h3>

                            <p class="text-xs text-slate-500 mt-3">

                                {{ number_format($moderatePercent, 1) }}%

                            </p>

                        </div>

                        <!-- LOW RISK -->

                        <div>

                            <p class="text-xs font-medium text-green-700">

                                Low Risk

                            </p>

                            <h3 class="text-2xl font-semibold text-green-700 mt-2">

                                {{ $lowRisk }}

                            </h3>

                            <p class="text-xs text-slate-500 mt-3">

                                {{ number_format($lowPercent, 1) }}%

                            </p>

                        </div>

                    </div>

                    <!-- OVERALL DISTRIBUTION BAR -->

                    <div class="mt-4">

                        <div class="w-full flex h-3 rounded-full overflow-hidden bg-slate-100" role="img" aria-label="Household risk distribution: {{ number_format($highPercent, 1) }} percent high risk, {{ number_format($moderatePercent, 1) }} percent moderate risk, {{ number_format($lowPercent, 1) }} percent low risk">

                            @if ($totalHouseholds > 0)

                                <div class="bg-red-500"

                                     style="width: {{ $highPercent }}%">

                                </div>

                                <div class="bg-orange-500"

                                     style="width: {{ $moderatePercent }}%">

                                </div>

                                <div class="bg-green-500"

                                     style="width: {{ $lowPercent }}%">

                                </div>

                            @endif

                        </div>

                        <p class="text-xs text-slate-500 mt-2">

                            Overall household risk distribution

                        </p>

                    </div>

                </div>

            </div>

            <!-- HOUSEHOLD RISK ASSESSMENT -->

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <!-- SECTION HEADER -->

                <div class="px-5 py-4 border-b border-slate-200">

                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

                        <div>

                            <h3 class="text-base font-bold text-slate-900">

                                Household Risk Assessment

                            </h3>

                            <p class="text-xs text-slate-500 mt-1">

                                Manage and evaluate household risk classifications.

                            </p>

                        </div>

                        <div class="flex gap-2">

                            <div class="inline-flex items-center gap-1.5 bg-green-50 border border-green-100 text-green-700 px-3 py-2 rounded-lg text-xs font-medium">

                                <span class="font-bold">{{ $assessedCount }}</span>

                                Assessed

                            </div>

                            <div class="inline-flex items-center gap-1.5 bg-orange-50 border border-orange-100 text-orange-700 px-3 py-2 rounded-lg text-xs font-medium">

                                <span class="font-bold">{{ $pendingCount }}</span>

                                Pending

                            </div>

                        </div>

                    </div>

                </div>

                <!-- SEARCH AND FILTER -->

                <div class="px-5 py-4 border-b border-slate-200">

                    <div class="flex items-start gap-3 mb-4">

                        <div class="w-9 h-9 bg-orange-100 text-orange-600 rounded-lg flex items-center justify-center shrink-0">

                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"

                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"

                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

                                <circle cx="11" cy="11" r="8"></circle>

                                <path d="m21 21-4.35-4.35"></path>

                            </svg>

                        </div>

                        <div>

                            <p class="text-sm font-semibold text-slate-800">

                                Find Household Records

                            </p>

                            <p class="text-xs text-slate-500 mt-1">

                                Search by household head or narrow the list by risk level.

                            </p>

                        </div>

                    </div>

                    <!-- ALIGNED SEARCH ROW -->

                    <div class="risk-search-grid">

                        <!-- HOUSEHOLD NAME -->

                        <div class="risk-search-name">

                            <label for="householdSearch"

                                   class="block text-xs font-semibold text-slate-700 mb-2">

                                Household Name

                            </label>

                            <div class="relative">

                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"

                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"

                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

                                        <circle cx="11" cy="11" r="8"></circle>

                                        <path d="m21 21-4.35-4.35"></path>

                                    </svg>

                                </span>

                                <input

                                    type="text"

                                    id="householdSearch"

                                    placeholder="Type household head name..."

                                    class="risk-search-control border border-slate-300 rounded-lg pl-10 pr-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#EA580C] focus:border-[#EA580C] transition">

                            </div>

                        </div>

                        <!-- RISK LEVEL -->

                        <div class="">

                            <label for="riskFilter"

                                   class="block text-xs font-semibold text-slate-700 mb-2">

                                Risk Level

                            </label>

                            <select

                                id="riskFilter"

                                class="risk-search-control border border-slate-300 rounded-lg px-4 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#EA580C] focus:border-[#EA580C] transition">

                                <option value="all">All Risk Levels</option>

                                <option value="High">High Risk</option>

                                <option value="Moderate">Moderate Risk</option>

                                <option value="Low">Low Risk</option>

                                <option value="Pending">Not Assessed</option>

                            </select>

                        </div>

                        <!-- SEARCH -->

                        <div class="">

                            <button

                                type="button"

                                id="searchButton"

                                class="risk-search-control bg-[#EA580C] hover:bg-[#C2410C] text-white rounded-lg text-sm font-semibold transition flex items-center justify-center gap-2">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"

                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"

                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

                                    <circle cx="11" cy="11" r="8"></circle>

                                    <path d="m21 21-4.35-4.35"></path>

                                </svg>

                                Search

                            </button>

                        </div>

                        <!-- RESET -->

                        <div class="">

                            <button

                                type="button"

                                id="resetButton"

                                class="risk-search-control border border-slate-300 bg-white hover:bg-slate-50 text-slate-700 rounded-lg text-sm font-medium transition flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"

                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"

                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

                                    <path d="M3 12a9 9 0 1 0 2.6-6.4L3 8"></path>

                                    <path d="M3 3v5h5"></path>

                                </svg>

                            </button>

                        </div>

                    </div>

                </div>

                <!-- HOUSEHOLD TABLE -->

                <div class="overflow-x-auto">

                    <table class="w-full min-w-[900px] text-left">

                        <thead class="bg-[#0F172A] text-white text-xs uppercase tracking-wider">

                            <tr>

                                <th class="px-5 py-3 font-semibold">Household Head</th>

                                <th class="px-5 py-3 font-semibold">Purok</th>

                                <th class="px-5 py-3 font-semibold">Members</th>

                                <th class="px-5 py-3 font-semibold">Risk Level</th>

                                <th class="px-5 py-3 font-semibold">Score</th>

                                <th class="px-5 py-3 font-semibold">Assessment Status</th>

                                <th class="px-5 py-3 font-semibold text-right">Action</th>

                            </tr>

                        </thead>

                        <tbody id="householdTable" class="divide-y divide-slate-100">

                            @forelse ($households as $household)

                                @php

                                    $isAssessed = $household->risk_assessed_at !== null;

                                    $filterRisk = $isAssessed ? $household->risk_level : 'Pending';

                                @endphp

                                <tr class="household-row hover:bg-slate-50 transition"

                                    data-name="{{ strtolower($household->household_head) }}"

                                    data-purok="{{ strtolower($household->purok) }}"

                                    data-risk="{{ $filterRisk }}">

                                    <td class="px-5 py-4">

                                        <p class="text-sm font-semibold text-slate-800">

                                            {{ $household->household_head }}

                                        </p>

                                        <p class="text-xs text-slate-400 mt-1">

                                            {{ $household->barangay }}

                                        </p>

                                    </td>

                                    <td class="px-5 py-4 text-sm text-slate-600">

                                        {{ $household->purok }}

                                    </td>

                                    <td class="px-5 py-4 text-sm text-slate-600">

                                        {{ $household->members }}

                                    </td>

                                    <td class="px-5 py-4">

                                        @if ($household->risk_level === 'High' && $isAssessed)

                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-700 border border-red-100"><span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>

                                                High

                                            </span>

                                        @elseif ($household->risk_level === 'Moderate' && $isAssessed)

                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-orange-50 text-orange-700 border border-orange-100"><span class="h-1.5 w-1.5 rounded-full bg-orange-500"></span>

                                                Moderate

                                            </span>

                                        @elseif ($household->risk_level === 'Low' && $isAssessed)

                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-green-50 text-green-700 border border-green-100"><span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>

                                                Low

                                            </span>

                                        @else

                                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-500 border border-slate-200">

                                                -

                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-5 py-4 text-sm font-semibold text-slate-700">

                                        {{ $isAssessed ? $household->risk_score . ' / 10' : '-' }}

                                    </td>

                                    <td class="px-5 py-4">

                                        @if ($isAssessed)

                                            <span class="text-xs font-semibold text-green-700">

                                                <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-1"></span>

                                                Assessed

                                            </span>

                                        @else

                                            <span class="text-xs font-semibold text-orange-600">

                                                <span class="inline-block w-2 h-2 bg-orange-500 rounded-full mr-1"></span>

                                                Pending

                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-5 py-4 text-right">

                                        <button

                                            type="button"

                                            onclick="openAssessmentModal({{ $household->id }})"

                                            class="inline-flex items-center justify-center gap-1.5 bg-[#EA580C] hover:bg-[#C2410C] focus:outline-none focus:ring-2 focus:ring-[#EA580C] focus:ring-offset-2 text-white text-xs font-semibold px-4 py-2.5 rounded-lg shadow-sm transition whitespace-nowrap">

                                            {{ $isAssessed ? 'View / Update' : 'Assess Household' }}

                                        </button>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="7" class="px-5 py-10 text-center">

                                        <p class="font-semibold text-slate-700">

                                            No household records found

                                        </p>

                                        <p class="text-sm text-slate-500 mt-2">

                                            Register households first to begin risk assessment.

                                        </p>

                                        <a href="{{ route('households.create') }}"

                                           class="inline-block mt-3 text-orange-600 font-semibold text-sm">

                                            + Register Household

                                        </a>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                    <!-- NO SEARCH RESULTS -->

                    <div id="noSearchResults" class="hidden p-8 text-center">

                        <p class="font-semibold text-slate-700">

                            No matching households found.

                        </p>

                        <p class="text-sm text-slate-500 mt-1">

                            Try another search or risk filter.

                        </p>

                    </div>

                </div>

                <!-- TABLE FOOTER -->

                <div class="px-5 py-3 border-t border-slate-200 bg-slate-50">

                    <p class="text-xs text-slate-500">

                        Showing {{ $totalHouseholds }} registered household records

                    </p>

                </div>

            </div>

            <p class="text-xs text-slate-400 mt-5">

                Risk classifications use the proposed HERMIS scoring criteria and should be reviewed against validated hazard information and local DRRM assessment.

            </p>

        </section>

</div>

@foreach ($households as $household)

<div id="assessmentModal-{{ $household->id }}"

     class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 backdrop-blur-sm p-4">

    <div class="bg-white w-full max-w-3xl max-h-[90vh] overflow-y-auto rounded-2xl shadow-2xl">

        <!-- MODAL HEADER -->

        <div class="sticky top-0 z-10 bg-[#0F172A] border-b border-slate-700 px-6 py-5 flex justify-between items-center text-white">

            <div>

                <p class="text-xs font-bold text-orange-400 uppercase tracking-wider">

                    HERMIS Risk Assessment

                </p>

                <h2 class="text-xl font-bold text-white mt-1">

                    {{ $household->household_head }}

                </h2>

                <p class="text-xs text-slate-500 mt-1">

                    {{ $household->purok }}, {{ $household->barangay }}

                    | {{ $household->members }} members

                </p>

            </div>

            <button type="button"

                    onclick="closeAssessmentModal({{ $household->id }})"

                    class="w-9 h-9 rounded-lg text-slate-300 hover:bg-white/10 hover:text-white text-xl transition">

                &times;

            </button>

        </div>

        <!-- MODAL BODY -->

        <div class="p-6">

            <form method="POST"

                  action="{{ route('risk-monitoring.assessment', $household->id) }}">

                @csrf

                <div class="mb-6 p-4 bg-orange-50 border border-orange-100 rounded-lg">

                    <p class="text-sm font-semibold text-slate-800">

                        Assessment Information

                    </p>

                    <p class="text-xs text-slate-500 mt-1">

                        Evaluate the household using the five assessment factors below.

                    </p>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- HAZARD EXPOSURE -->

                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">

                            1. Hazard Exposure

                        </label>

                        <select name="hazard_exposure" required

                                class="w-full border border-slate-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#EA580C] focus:border-[#EA580C]">

                            <option value="">Select exposure</option>

                            <option value="Low" @selected(old('hazard_exposure', $household->hazard_exposure) == 'Low')>Low</option>

                            <option value="Moderate" @selected(old('hazard_exposure', $household->hazard_exposure) == 'Moderate')>Moderate</option>

                            <option value="High" @selected(old('hazard_exposure', $household->hazard_exposure) == 'High')>High</option>

                        </select>

                    </div>

                    <!-- DISTANCE FROM HAZARD -->

                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">

                            2. Distance from Hazard Area

                        </label>

                        <select name="distance_from_hazard" required

                                class="w-full border border-slate-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#EA580C] focus:border-[#EA580C]">

                            <option value="">Select distance</option>

                            <option value="Far" @selected(old('distance_from_hazard', $household->distance_from_hazard) == 'Far')>Far</option>

                            <option value="Moderate" @selected(old('distance_from_hazard', $household->distance_from_hazard) == 'Moderate')>Moderate</option>

                            <option value="Near" @selected(old('distance_from_hazard', $household->distance_from_hazard) == 'Near')>Near</option>

                        </select>

                    </div>

                    <!-- VULNERABLE MEMBERS -->

                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">

                            3. Number of Vulnerable Members

                        </label>

                        <input type="number"

                               name="vulnerable_members"

                               min="0"

                               required

                               value="{{ old('vulnerable_members', $household->vulnerable_members ?? 0) }}"

                               class="w-full border border-slate-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#EA580C] focus:border-[#EA580C]">

                        <p class="text-xs text-slate-400 mt-1">

                            Children, senior citizens, pregnant women, PWDs, and members needing assistance.

                        </p>

                    </div>

                    <!-- HOUSE CONDITION -->

                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">

                            4. House Condition

                        </label>

                        <select name="house_condition" required

                                class="w-full border border-slate-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#EA580C] focus:border-[#EA580C]">

                            <option value="">Select condition</option>

                            <option value="Good" @selected(old('house_condition', $household->house_condition) == 'Good')>Good</option>

                            <option value="Fair" @selected(old('house_condition', $household->house_condition) == 'Fair')>Fair</option>

                            <option value="Poor" @selected(old('house_condition', $household->house_condition) == 'Poor')>Poor</option>

                        </select>

                    </div>

                    <!-- EVACUATION ACCESSIBILITY -->

                    <div class="md:col-span-2">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">

                            5. Evacuation Accessibility

                        </label>

                        <select name="evacuation_accessibility" required

                                class="w-full border border-slate-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#EA580C] focus:border-[#EA580C]">

                            <option value="">Select accessibility</option>

                            <option value="Accessible" @selected(old('evacuation_accessibility', $household->evacuation_accessibility) == 'Accessible')>Accessible</option>

                            <option value="Limited" @selected(old('evacuation_accessibility', $household->evacuation_accessibility) == 'Limited')>Limited</option>

                            <option value="Difficult" @selected(old('evacuation_accessibility', $household->evacuation_accessibility) == 'Difficult')>Difficult</option>

                        </select>

                    </div>

                </div>

                <!-- RISK SCORING GUIDE -->

                <div class="mt-6 p-5 bg-slate-50 border border-slate-200 rounded-xl">

                    <h4 class="font-bold text-slate-800 mb-3">

                        Risk Scoring Guide

                    </h4>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

                        <div class="bg-green-50 border border-green-200 rounded-lg p-3">

                            <p class="text-sm font-bold text-green-700">Low Risk</p>

                            <p class="text-xs text-green-700 mt-1">0-3 Points</p>

                        </div>

                        <div class="bg-orange-50 border border-orange-200 rounded-lg p-3">

                            <p class="text-sm font-bold text-orange-700">Moderate Risk</p>

                            <p class="text-xs text-orange-700 mt-1">4-6 Points</p>

                        </div>

                        <div class="bg-red-50 border border-red-200 rounded-lg p-3">

                            <p class="text-sm font-bold text-red-700">High Risk</p>

                            <p class="text-xs text-red-700 mt-1">7-10 Points</p>

                        </div>

                    </div>

                    <p class="text-xs text-slate-500 mt-3">

                        Each assessment factor receives 0, 1, or 2 points. The system calculates the total score after submission.

                    </p>

                </div>

                <!-- CURRENT ASSESSMENT -->

                @if ($household->risk_assessed_at)

                    <div class="mt-5 p-4 border border-slate-200 rounded-lg">

                        <p class="text-xs text-slate-500">

                            Last assessed:

                            {{ $household->risk_assessed_at->format('M d, Y h:i A') }}

                        </p>

                        <p class="text-sm font-semibold text-slate-700 mt-2">

                            Current Score: {{ $household->risk_score }} / 10

                        </p>

                        <p class="text-sm font-semibold text-slate-700 mt-1">

                            Current Risk: {{ $household->risk_level }}

                        </p>

                    </div>

                @else

                    <p class="mt-5 text-xs text-slate-400">

                        This household has not been assessed yet.

                    </p>

                @endif

                <!-- FORM BUTTONS -->

                <div class="mt-6 pt-5 border-t border-slate-200 flex flex-col-reverse sm:flex-row justify-end gap-3">

                    <button type="button"

                            onclick="closeAssessmentModal({{ $household->id }})"

                            class="px-5 py-3 rounded-lg border border-slate-300 text-slate-600 text-sm font-semibold hover:bg-slate-50 transition">

                        Cancel

                    </button>

                    <button type="submit"

                            class="px-6 py-3 rounded-lg bg-[#EA580C] hover:bg-[#C2410C] text-white text-sm font-semibold transition">

                        Save Risk Assessment

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endforeach

<!-- JAVASCRIPT -->

<script>

    // OPEN ASSESSMENT MODAL

    function openAssessmentModal(id) {

        const modal = document.getElementById('assessmentModal-' + id);

        if (!modal) return;

        modal.classList.remove('hidden');

        modal.classList.add('flex');

        document.body.style.overflow = 'hidden';

    }

    // CLOSE ASSESSMENT MODAL

    function closeAssessmentModal(id) {

        const modal = document.getElementById('assessmentModal-' + id);

        if (!modal) return;

        modal.classList.add('hidden');

        modal.classList.remove('flex');

        document.body.style.overflow = '';

    }

    // CLOSE MODAL WHEN CLICKING OUTSIDE

    document.querySelectorAll('[id^="assessmentModal-"]').forEach(modal => {

        modal.addEventListener('click', function(event) {

            if (event.target === modal) {

                modal.classList.add('hidden');

                modal.classList.remove('flex');

                document.body.style.overflow = '';

            }

        });

    });

    // CLOSE MODAL USING ESCAPE KEY

    document.addEventListener('keydown', function(event) {

        if (event.key === 'Escape') {

            document.querySelectorAll('[id^="assessmentModal-"]').forEach(modal => {

                modal.classList.add('hidden');

                modal.classList.remove('flex');

            });

            document.body.style.overflow = '';

        }

    });

    // SEARCH AND FILTER

    const searchInput = document.getElementById('householdSearch');

    const riskFilter = document.getElementById('riskFilter');

    const searchButton = document.getElementById('searchButton');

    const resetButton = document.getElementById('resetButton');

    const householdRows = document.querySelectorAll('.household-row');

    const noResults = document.getElementById('noSearchResults');

    function filterHouseholds() {

        const searchValue = searchInput.value.toLowerCase().trim();

        const selectedRisk = riskFilter.value;

        let visibleCount = 0;

        householdRows.forEach(row => {

            const name = row.dataset.name || '';

            const purok = row.dataset.purok || '';

            const risk = row.dataset.risk || '';

            const matchesSearch =

                name.includes(searchValue) ||

                purok.includes(searchValue);

            const matchesRisk =

                selectedRisk === 'all' ||

                selectedRisk === risk;

            if (matchesSearch && matchesRisk) {

                row.classList.remove('hidden');

                visibleCount++;

            } else {

                row.classList.add('hidden');

            }

        });

        if (noResults) {

            noResults.classList.toggle('hidden', visibleCount > 0);

        }

    }

    // SEARCH BUTTON

    searchButton.addEventListener('click', filterHouseholds);

    // ENTER KEY SEARCH

    searchInput.addEventListener('keydown', function(event) {

        if (event.key === 'Enter') {

            event.preventDefault();

            filterHouseholds();

        }

    });

    // RESET BUTTON

    resetButton.addEventListener('click', function() {

        searchInput.value = '';

        riskFilter.value = 'all';

        filterHouseholds();

    });

</script>

</x-app-layout>