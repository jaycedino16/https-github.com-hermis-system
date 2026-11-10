<x-app-layout>

    <section class="space-y-7">

        {{-- PAGE HEADER: EXACT DASHBOARD V4 STYLE --}}
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
                        Operations / Evacuation Monitoring
                    </p>
                    <h1 class="mt-1 text-3xl font-extrabold tracking-tight text-[#0F172A] sm:text-4xl">
                        Evacuation Monitoring
                    </h1>
                    <p class="mt-2 text-sm text-slate-500">
                        Monitor evacuation activities, track evacuees, and manage household evacuation operations.
                    </p>
                </div>
            </div>
        </section>

        {{-- SUCCESS MESSAGE --}}

        @if (session('success'))

            <div class="flex items-start gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 shadow-sm text-sm text-green-800">

                <svg class="mt-0.5 h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">

                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>

                </svg>

                <span>{{ session('success') }}</span>

            </div>

        @endif

        {{-- ERROR MESSAGES --}}

        @if ($errors->any())

            <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-4 shadow-sm text-sm text-red-800">

                <div class="flex items-center gap-2 font-bold">

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">

                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.3 3.9L2.8 17a2 2 0 001.7 3h15a2 2 0 001.7-3L13.7 3.9a2 2 0 00-3.4 0z"/>

                    </svg>

                    Please check the following:

                </div>

                <ul class="mt-2 list-disc space-y-1 pl-7">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        {{-- EVACUATION OVERVIEW --}}

        <div>

            <div class="mb-5 border-l-4 border-[#EA580C] pl-4">
                <h2 class="text-lg font-bold text-[#0F172A]">Evacuation Overview</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Current evacuation statistics and household progress.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-5">

                {{-- TOTAL HOUSEHOLDS --}}

                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A !important;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%) !important;color:#FFFFFF !important;">

                    <div class="flex items-center justify-between">

                        <p class="relative z-10 text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">Total Households</p>

                        <div class="relative z-10 flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">

                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10.5L12 3l9 7.5V20a1 1 0 01-1 1h-6v-6H10v6H4a1 1 0 01-1-1v-9.5z"/>

                            </svg>

                        </div>

                    </div>

                    <h3 class="relative z-10 mt-4 text-3xl font-extrabold text-white" style="color:#FFFFFF !important;">

                        {{ $totalHouseholds }}

                    </h3>

                    <p class="relative z-10 mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Registered households</p>

                </div>

                {{-- FOR EVACUATION --}}

                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A !important;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%) !important;color:#FFFFFF !important;">

                    <div class="flex items-center justify-between">

                        <p class="relative z-10 text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">For Evacuation</p>

                        <div class="relative z-10 flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">

                                <circle cx="12" cy="12" r="9"/>

                                <path stroke-linecap="round" d="M12 8v4m0 4h.01"/>

                            </svg>

                        </div>

                    </div>

                    <h3 class="relative z-10 mt-4 text-3xl font-extrabold text-white" style="color:#FFFFFF !important;">

                        {{ $totalForEvacuation }}

                    </h3>

                    <p class="relative z-10 mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Households awaiting evacuation</p>

                </div>

                {{-- EVACUATED HOUSEHOLDS --}}

                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A !important;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%) !important;color:#FFFFFF !important;">

                    <div class="flex items-center justify-between">

                        <p class="relative z-10 text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">Evacuated Households</p>

                        <div class="relative z-10 flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">

                                <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6"/>

                            </svg>

                        </div>

                    </div>

                    <h3 class="relative z-10 mt-4 text-3xl font-extrabold text-white" style="color:#FFFFFF !important;">

                        {{ $totalEvacuated }}

                    </h3>

                    <p class="relative z-10 mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Successfully evacuated</p>

                </div>

                {{-- TOTAL EVACUEES --}}

                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A !important;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%) !important;color:#FFFFFF !important;">

                    <div class="flex items-center justify-between">

                        <p class="relative z-10 text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">Total Evacuees</p>

                        <div class="relative z-10 flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">

                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>

                                <circle cx="10" cy="7" r="4"/>

                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>

                            </svg>

                        </div>

                    </div>

                    <h3 class="relative z-10 mt-4 text-3xl font-extrabold text-white" style="color:#FFFFFF !important;">

                        {{ $totalEvacuees }}

                    </h3>

                    <p class="relative z-10 mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Individuals currently evacuated</p>

                </div>

                {{-- RETURNED HOME --}}

                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A !important;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%) !important;color:#FFFFFF !important;">

                    <div class="flex items-center justify-between">

                        <p class="relative z-10 text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">Returned Home</p>

                        <div class="relative z-10 flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">

                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 14 4 9l5-5"/>

                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 9h10a6 6 0 010 12h-2"/>

                            </svg>

                        </div>

                    </div>

                    <h3 class="relative z-10 mt-4 text-3xl font-extrabold text-white" style="color:#FFFFFF !important;">

                        {{ $totalReturnedHome }}

                    </h3>

                    <p class="relative z-10 mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Households that returned home</p>

                </div>

            </div>

        </div>

        {{-- EVACUATION TRACKING --}}

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- SECTION HEADER --}}

            <div class="border-b border-slate-200 bg-white p-5 sm:p-6">

                <div class="flex items-start gap-3">

                    <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-orange-50 text-[#EA580C] ring-1 ring-inset ring-orange-100">

                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">

                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h15m-4-4 4 4-4 4M20 17H5m4-4-4 4 4 4"/>

                        </svg>

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-[#0F172A]">Evacuation Tracking</h2>

                        <p class="mt-1 text-sm text-slate-500">

                            Monitor household evacuation status and manage evacuation records.

                        </p>

                    </div>

                </div>

            </div>

            {{-- SEARCH AND FILTER --}}

            <div class="border-b border-slate-200 bg-slate-50/80 px-5 py-5 sm:px-6">

                <div class="grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-[minmax(220px,1fr)_200px_auto] xl:items-end">

                    <div>

                        <label for="householdSearch" class="mb-1.5 block text-xs font-semibold text-slate-600">

                            Household Name

                        </label>

                        <div class="relative">

                            <svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400"

                                 fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">

                                <circle cx="11" cy="11" r="7"/>

                                <path d="m20 20-4-4"/>

                            </svg>

                            <input

                                type="text"

                                id="householdSearch"

                                placeholder="Search household head..."

                                class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-10 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#EA580C] focus:ring-4 focus:ring-orange-500/10">

                        </div>

                    </div>

                    <div>

                        <label for="riskFilter" class="mb-1.5 block text-xs font-semibold text-slate-600">

                            Risk Level

                        </label>

                        <select

                            id="riskFilter"

                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-[#EA580C] focus:ring-4 focus:ring-orange-500/10">

                            <option value="">All Risk Levels</option>

                            <option value="High">High</option>

                            <option value="Moderate">Moderate</option>

                            <option value="Low">Low</option>

                        </select>

                    </div>

                    <div class="flex gap-2">

                        <button

                            type="button"

                            id="searchButton"

                            class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl bg-[#EA580C] px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-[#C2410C] sm:flex-none">

                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">

                                <circle cx="11" cy="11" r="7"/>

                                <path d="m20 20-4-4"/>

                            </svg>

                            Search

                        </button>

                        <button

                            type="button"

                            id="resetButton"

                            class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100 sm:flex-none">

                            Reset

                        </button>

                    </div>

                </div>

            </div>

            {{-- HOUSEHOLD TABLE --}}

            <div class="overflow-x-auto">

                <table class="w-full min-w-[1150px] text-left">

                    <thead class="bg-[#0F172A]">

                        <tr class="text-[11px] font-bold uppercase tracking-wider text-white/90">

                            <th class="px-5 py-4">Household Head</th>

                            <th class="px-5 py-4">Purok</th>

                            <th class="px-5 py-4">Members</th>

                            <th class="px-5 py-4">Risk Level</th>

                            <th class="px-5 py-4">Evacuation Center</th>

                            <th class="px-5 py-4">Evacuees</th>

                            <th class="px-5 py-4">Evacuation Status</th>

                            <th class="min-w-[220px] px-5 py-4">Remarks</th>

                            <th class="px-5 py-4 text-center">Action</th>

                        </tr>

                    </thead>

                    <tbody id="householdTableBody" class="divide-y divide-slate-100">

                        @forelse ($households as $household)

                            @php

                                $evacuation = $household->evacuations->first();

                                $currentStatus = $evacuation?->evacuation_status ?? 'Not Evacuated';

                            @endphp

                            <tr

                                class="household-row transition duration-150 hover:bg-orange-50/30"

                                data-name="{{ strtolower($household->household_head) }}"

                                data-risk="{{ $household->risk_level }}">

                                {{-- HOUSEHOLD HEAD --}}

                                <td class="px-5 py-4">

                                    <p class="text-sm font-semibold text-slate-800">

                                        {{ $household->household_head }}

                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">

                                        {{ $household->contact_number ?? 'No contact number' }}

                                    </p>

                                </td>

                                {{-- PUROK --}}

                                <td class="px-5 py-4 text-sm text-slate-600">

                                    {{ $household->purok }}

                                </td>

                                {{-- MEMBERS --}}

                                <td class="px-5 py-4 text-sm font-medium text-slate-700">

                                    {{ $household->members }}

                                </td>

                                {{-- RISK LEVEL --}}

                                <td class="px-5 py-4">

                                    @if ($household->risk_level === 'High')

                                        <span class="inline-flex rounded-full bg-red-50 px-3 py-1 text-xs font-semibold text-red-700">

                                            High

                                        </span>

                                    @elseif ($household->risk_level === 'Moderate')

                                        <span class="inline-flex rounded-full bg-orange-50 px-3 py-1 text-xs font-semibold text-orange-700">

                                            Moderate

                                        </span>

                                    @else

                                        <span class="inline-flex rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">

                                            {{ $household->risk_level }}

                                        </span>

                                    @endif

                                </td>

                                {{-- EVACUATION CENTER --}}

                                <td class="px-5 py-4 text-sm text-slate-600">

                                    {{ $evacuation?->evacuation_center ?? 'Not Assigned' }}

                                </td>

                                {{-- EVACUEES --}}

                                <td class="px-5 py-4 text-sm font-medium text-slate-700">

                                    {{ $evacuation?->evacuees_count ?? 0 }} / {{ $household->members }}

                                </td>

                                {{-- EVACUATION STATUS --}}

                                <td class="px-5 py-4">

                                    @if ($currentStatus === 'Evacuated')

                                        <span class="inline-flex rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">

                                            Evacuated

                                        </span>

                                    @elseif ($currentStatus === 'For Evacuation')

                                        <span class="inline-flex rounded-full bg-orange-50 px-3 py-1 text-xs font-semibold text-orange-700">

                                            For Evacuation

                                        </span>

                                    @elseif ($currentStatus === 'Returned Home')

                                        <span class="inline-flex rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700">

                                            Returned Home

                                        </span>

                                    @else

                                        <span class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">

                                            Not Evacuated

                                        </span>

                                    @endif

                                </td>

                                {{-- REMARKS --}}

                                <td class="max-w-[300px] min-w-[220px] px-5 py-4 text-sm text-slate-600">

                                    @if (filled($evacuation?->remarks))

                                        <p class="whitespace-normal break-words leading-5">

                                            {{ $evacuation->remarks }}

                                        </p>

                                    @else

                                        <span class="italic text-slate-400">No remarks</span>

                                    @endif

                                </td>

                                {{-- ACTION --}}

                                <td class="px-5 py-4 text-center">

                                    <button

                                        type="button"

                                        onclick="openEvacuationModal('evacuationModal-{{ $household->id }}')"

                                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-[#EA580C] px-4 py-2 text-xs font-semibold text-white shadow-sm transition hover:bg-[#C2410C]">

                                        Update

                                    </button>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="9" class="px-6 py-16 text-center">

                                    <div class="mx-auto flex max-w-sm flex-col items-center">

                                        <div class="flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-slate-400">

                                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.6">

                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10.5L12 3l9 7.5V20a1 1 0 01-1 1h-6v-6H10v6H4a1 1 0 01-1-1v-9.5z"/>

                                            </svg>

                                        </div>

                                        <h3 class="mt-4 text-sm font-bold text-slate-800">

                                            No household records yet

                                        </h3>

                                        <p class="mt-2 text-sm text-slate-500">

                                            Register households first to start evacuation monitoring.

                                        </p>

                                        <a

                                            href="{{ route('households.create') }}"

                                            class="mt-5 inline-flex items-center gap-2 rounded-lg bg-[#EA580C] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#C2410C]">

                                            + Register Household

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                        {{-- SEARCH EMPTY STATE --}}

                        <tr id="noSearchResults" class="hidden">

                            <td colspan="9" class="px-6 py-12 text-center">

                                <h4 class="text-sm font-semibold text-slate-800">

                                    No matching household found

                                </h4>

                                <p class="mt-2 text-sm text-slate-500">

                                    Try changing your search or filter.

                                </p>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

            {{-- TABLE FOOTER --}}

            <div class="flex flex-col gap-2 border-t border-slate-200 bg-slate-50/80 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">

                <p class="text-xs text-slate-500">

                    Showing

                    <span id="visibleCount" class="font-bold text-slate-700">{{ $households->count() }}</span>

                    of

                    <span class="font-bold text-slate-700">{{ $households->count() }}</span>

                    household records

                </p>

                <p class="text-xs text-slate-400">HERMIS Evacuation Monitoring</p>

            </div>

        </div>

    </section>

    {{-- EVACUATION UPDATE MODALS --}}

    @foreach ($households as $household)

        @php

            $evacuation = $household->evacuations->first();

            $currentStatus = $evacuation?->evacuation_status ?? 'Not Evacuated';

        @endphp

        <div

            id="evacuationModal-{{ $household->id }}"

            class="fixed inset-0 z-[100] hidden items-center justify-center overflow-y-auto bg-slate-950/60 p-4 backdrop-blur-sm"

            onclick="if (event.target === this) closeEvacuationModal('evacuationModal-{{ $household->id }}')">

            <div

                class="relative my-auto w-full max-w-lg overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl"

                onclick="event.stopPropagation()">

                {{-- MODAL HEADER --}}

                <div class="relative flex items-center justify-between border-b border-slate-700 bg-[#0F172A] px-6 py-5 before:absolute before:inset-y-0 before:left-0 before:w-1 before:bg-[#EA580C]">

                    <div>

                        <p class="text-xs font-bold uppercase tracking-wider text-orange-400">

                            Household Evacuation

                        </p>

                        <h3 class="mt-1 text-lg font-bold text-white">

                            Update Evacuation

                        </h3>

                        <p class="mt-1 text-xs text-slate-300">

                            {{ $household->household_head }}

                        </p>

                    </div>

                    <button

                        type="button"

                        onclick="closeEvacuationModal('evacuationModal-{{ $household->id }}')"

                        class="flex h-9 w-9 items-center justify-center rounded-lg text-slate-300 transition hover:bg-white/10 hover:text-white"

                        aria-label="Close modal">

                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">

                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6L6 18"/>

                        </svg>

                    </button>

                </div>

                {{-- MODAL FORM --}}

                <form

                    method="POST"

                    action="{{ route('evacuation-monitoring.update-status', $household->id) }}"

                    class="p-6">

                    @csrf

                    @method('PATCH')

                    {{-- HOUSEHOLD INFORMATION --}}

                    <div class="mb-5 rounded-xl border border-slate-200 bg-slate-50 p-4">

                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">

                            Household Information

                        </p>

                        <div class="mt-3 grid grid-cols-2 gap-4">

                            <div>

                                <p class="text-xs text-slate-500">Household Members</p>

                                <p class="mt-1 text-sm font-bold text-slate-800">

                                    {{ $household->members }} Members

                                </p>

                            </div>

                            <div>

                                <p class="text-xs text-slate-500">Risk Level</p>

                                <p class="mt-1 text-sm font-bold text-slate-800">

                                    {{ $household->risk_level }}

                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="space-y-4">

                        {{-- EVACUATION STATUS --}}

                        <div>

                            <label class="mb-2 block text-sm font-semibold text-slate-700">

                                Evacuation Status

                                <span class="text-red-500">*</span>

                            </label>

                            <select

                                name="evacuation_status"

                                required

                                class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-[#EA580C] focus:bg-white focus:ring-4 focus:ring-orange-500/10">

                                @foreach (['Not Evacuated', 'For Evacuation', 'Evacuated', 'Returned Home'] as $status)

                                    <option value="{{ $status }}" {{ $currentStatus === $status ? 'selected' : '' }}>

                                        {{ $status }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        {{-- EVACUATION CENTER --}}

                        <div>

                            <label class="mb-2 block text-sm font-semibold text-slate-700">

                                Evacuation Center

                            </label>

                            <select

                                name="evacuation_center"

                                class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-[#EA580C] focus:bg-white focus:ring-4 focus:ring-orange-500/10">

                                <option value="">Select an Active Evacuation Center</option>

                                @foreach ($evacuationCenters->where('status', 'Active') as $center)

                                    <option

                                        value="{{ $center->center_name }}"

                                        {{ old('evacuation_center', $evacuation?->evacuation_center) === $center->center_name ? 'selected' : '' }}>

                                        {{ $center->center_name }} - Capacity: {{ number_format($center->capacity) }} persons

                                    </option>

                                @endforeach

                            </select>

                            @if ($evacuationCenters->where('status', 'Active')->isEmpty())

                                <p class="mt-2 text-xs text-red-600">

                                    No active evacuation centers are available. Please register or activate an evacuation center first.

                                </p>

                            @else

                                <p class="mt-2 text-xs text-slate-400">

                                    Only active registered evacuation centers are available for selection.

                                </p>

                            @endif

                        </div>

                        {{-- NUMBER OF EVACUEES --}}

                        <div>

                            <label class="mb-2 block text-sm font-semibold text-slate-700">

                                Number of Evacuees

                            </label>

                            <input

                                type="number"

                                name="evacuees_count"

                                value="{{ old('evacuees_count', $evacuation?->evacuees_count ?? 0) }}"

                                min="0"

                                max="{{ $household->members }}"

                                class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-[#EA580C] focus:bg-white focus:ring-4 focus:ring-orange-500/10">

                            <p class="mt-1 text-xs text-slate-400">

                                Maximum: {{ $household->members }} household members

                            </p>

                        </div>

                        {{-- REMARKS --}}

                        <div>

                            <label class="mb-2 block text-sm font-semibold text-slate-700">

                                Remarks

                            </label>

                            <textarea

                                name="remarks"

                                rows="3"

                                placeholder="Enter additional information..."

                                class="w-full resize-y rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#EA580C] focus:bg-white focus:ring-4 focus:ring-orange-500/10">{{ old('remarks', $evacuation?->remarks) }}</textarea>

                        </div>

                    </div>

                    {{-- MODAL ACTIONS --}}

                    <div class="mt-6 flex flex-col-reverse gap-3 border-t border-slate-200 pt-5 sm:flex-row sm:justify-end">

                        <button

                            type="button"

                            onclick="closeEvacuationModal('evacuationModal-{{ $household->id }}')"

                            class="rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">

                            Cancel

                        </button>

                        <button

                            type="submit"

                            class="rounded-xl bg-[#EA580C] px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-[#C2410C]">

                            Save Changes

                        </button>

                    </div>

                </form>

            </div>

        </div>

    @endforeach

    {{-- PAGE JAVASCRIPT --}}

    <script>

        function openEvacuationModal(id) {

            const modal = document.getElementById(id);

            if (!modal) return;

            modal.classList.remove('hidden');

            modal.classList.add('flex');

            document.body.style.overflow = 'hidden';

        }

        function closeEvacuationModal(id) {

            const modal = document.getElementById(id);

            if (!modal) return;

            modal.classList.add('hidden');

            modal.classList.remove('flex');

            const openModals = document.querySelectorAll(

                '[id^="evacuationModal-"].flex'

            );

            if (openModals.length === 0) {

                document.body.style.overflow = '';

            }

        }

        document.addEventListener('DOMContentLoaded', function () {

            const searchInput = document.getElementById('householdSearch');

            const riskFilter = document.getElementById('riskFilter');

            const searchButton = document.getElementById('searchButton');

            const resetButton = document.getElementById('resetButton');

            const rows = Array.from(

                document.querySelectorAll('.household-row')

            );

            const noResults = document.getElementById('noSearchResults');

            const visibleCount = document.getElementById('visibleCount');

            function filterHouseholds() {

                if (!searchInput || !riskFilter) return;

                const searchValue = searchInput.value.trim().toLowerCase();

                const riskValue = riskFilter.value.trim().toLowerCase();

                let count = 0;

                rows.forEach(function (row) {

                    const householdName = row.dataset.name || '';

                    const householdRisk = (row.dataset.risk || '').toLowerCase();

                    const matchesName = householdName.includes(searchValue);

                    const matchesRisk = !riskValue || householdRisk === riskValue;

                    const matches = matchesName && matchesRisk;

                    row.style.display = matches ? '' : 'none';

                    if (matches) count++;

                });

                if (noResults) {

                    noResults.classList.toggle('hidden', count !== 0 || rows.length === 0);

                }

                if (visibleCount) {

                    visibleCount.textContent = count;

                }

            }

            if (searchInput) {

                searchInput.addEventListener('input', filterHouseholds);

            }

            if (riskFilter) {

                riskFilter.addEventListener('change', filterHouseholds);

            }

            if (searchButton) {

                searchButton.addEventListener('click', filterHouseholds);

            }

            if (resetButton) {

                resetButton.addEventListener('click', function () {

                    searchInput.value = '';

                    riskFilter.value = '';

                    filterHouseholds();

                });

            }

            // ESCAPE KEY CLOSES OPEN MODALS

            document.addEventListener('keydown', function (event) {

                if (event.key === 'Escape') {

                    document.querySelectorAll('[id^="evacuationModal-"].flex')

                        .forEach(function (modal) {

                            closeEvacuationModal(modal.id);

                        });

                }

            });

        });

    </script>

</x-app-layout>
