
<x-app-layout>
    @php
        $totalCenters = $evacuationCenters->count();
        $activeCenters = $evacuationCenters->where('status', 'Active')->count();
        $totalCapacity = $evacuationCenters->sum('capacity');
    @endphp

    <div class="mx-auto max-w-[1600px] space-y-7 px-1 pb-10">

        {{-- PAGE HEADER: MATCHES DASHBOARD BANNER --}}
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
                        Management / Evacuation Centers
                    </p>
                    <h1 class="mt-1 text-3xl font-extrabold tracking-tight text-[#0F172A] sm:text-4xl">
                        Evacuation Centers
                    </h1>
                    <p class="mt-2 text-sm text-slate-500">
                        Manage evacuation facilities, locations, contacts, and available capacity.
                    </p>
                </div>
                <button type="button" onclick="openAddModal()"
                    class="relative z-10 inline-flex shrink-0 items-center justify-center gap-2 rounded-lg bg-[#EA580C] px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-[#C2410C] focus:outline-none focus:ring-2 focus:ring-[#EA580C]/30">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" d="M12 5v14m-7-7h14"/>
                    </svg>
                    Add Evacuation Center
                </button>
            </div>
        </section>

        {{-- FLASH MESSAGES --}}
        @if(session('success'))
            <div class="flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-4 text-sm text-red-700">
                <p class="font-bold">Please check the following:</p>
                <ul class="mt-2 list-inside list-disc space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- OVERVIEW --}}
        <div>
            <div class="mb-5 border-l-4 border-[#EA580C] pl-4">
                <h2 class="text-xl font-bold text-[#0F172A]">Center Overview</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Summary of registered evacuation facilities and their capacity.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">

                {{-- TOTAL CENTERS --}}
                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-semibold text-slate-200">Total Centers</p>
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-7h6v7"/>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-1 text-3xl font-extrabold text-white">{{ $totalCenters }}</p>
                    <p class="mt-2 text-xs text-slate-300">Registered evacuation facilities</p>
                </div>

                {{-- ACTIVE CENTERS --}}
                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-semibold text-slate-200">Active Centers</p>
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6"/>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-1 text-3xl font-extrabold text-white">{{ $activeCenters }}</p>
                    <p class="mt-2 text-xs text-slate-300">Centers currently marked active</p>
                </div>

                {{-- TOTAL CAPACITY --}}
                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-semibold text-slate-200">Total Capacity</p>
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m6-10a4 4 0 100-8 4 4 0 000 8zm8-1v6m3-3h-6"/>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-1 text-3xl font-extrabold text-white">{{ number_format($totalCapacity) }}</p>
                    <p class="mt-2 text-xs text-slate-300">Maximum persons across all centers</p>
                </div>

                {{-- CURRENT OCCUPANTS --}}
                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-semibold text-slate-200">Current Occupants</p>
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                                <circle cx="10" cy="7" r="4"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-1 text-3xl font-extrabold text-white">{{ number_format($totalCurrentOccupants) }}</p>
                    <p class="mt-2 text-xs text-slate-300">Recorded evacuees in all centers</p>
                </div>

                {{-- AVAILABLE SLOTS --}}
                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-semibold text-slate-200">Available Slots</p>
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-1 text-3xl font-extrabold text-white">{{ number_format($totalAvailableSlots) }}</p>
                    <p class="mt-2 text-xs text-slate-300">Open slots in active centers only</p>
                </div>

            </div>
        </div>

        {{-- CENTER DIRECTORY --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 p-5 sm:p-6">
                <div class="flex items-start gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-orange-50 text-orange-600">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-7h6v7"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-slate-900">Evacuation Center Directory</h2>
                        <p class="mt-1 text-sm text-slate-500">
                            View, search, and manage registered evacuation facilities.
                        </p>
                    </div>
                </div>
            </div>

            {{-- SEARCH AND FILTER --}}
            <div class="border-b border-slate-200 bg-slate-50/70 px-5 py-5 sm:px-6">
                <div class="grid grid-cols-1 gap-3 md:grid-cols-[minmax(0,1fr)_220px_auto] md:items-end">

                    <div>
                        <label for="centerSearch" class="mb-1.5 block text-xs font-semibold text-slate-600">
                            Search Center
                        </label>
                        <div class="relative">
                            <svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                <circle cx="11" cy="11" r="7"/>
                                <path d="m20 20-4-4"/>
                            </svg>
                            <input id="centerSearch" type="text"
                                class="w-full rounded-lg border border-slate-300 bg-white py-2.5 pl-9 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-orange-500 focus:ring-2 focus:ring-orange-100"
                                placeholder="Search center name or location...">
                        </div>
                    </div>

                    <div>
                        <label for="statusFilter" class="mb-1.5 block text-xs font-semibold text-slate-600">
                            Center Status
                        </label>
                        <select id="statusFilter"
                            class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-700 outline-none transition focus:border-orange-500 focus:ring-2 focus:ring-orange-100">
                            <option value="">All Statuses</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Under Maintenance">Under Maintenance</option>
                        </select>
                    </div>

                    <div class="flex gap-2">
                        <button type="button" onclick="filterCenters()"
                            class="flex-1 rounded-lg bg-[#EA580C] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#C2410C] md:flex-none">
                            Search
                        </button>
                        <button type="button" onclick="resetCenterFilters()"
                            class="flex-1 rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-100 md:flex-none">
                            Reset
                        </button>
                    </div>
                </div>
            </div>

            {{-- TABLE --}}
            <div class="overflow-x-auto">
                <table class="w-full min-w-[1250px] text-left">
                    <thead class="bg-slate-50">
                        <tr class="text-[11px] font-bold uppercase tracking-wider text-slate-500">
                            <th class="px-5 py-4">Center Name</th>
                            <th class="px-5 py-4">Location</th>
                            <th class="px-5 py-4">Contact Person</th>
                            <th class="px-5 py-4">Capacity</th>
                            <th class="px-5 py-4">Current Occupants</th>
                            <th class="px-5 py-4">Available Slots</th>
                            <th class="px-5 py-4">Facilities</th>
                            <th class="px-5 py-4">Status</th>
                            <th class="px-5 py-4 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody id="centersTableBody" class="divide-y divide-slate-100 text-sm">

                        @forelse($evacuationCenters as $center)
                            <tr class="center-row transition hover:bg-slate-50"
                                data-search="{{ strtolower($center->center_name.' '.$center->address.' '.$center->purok.' '.$center->barangay.' '.$center->contact_person) }}"
                                data-status="{{ $center->status }}">

                                <td class="px-5 py-4">
                                    <p class="font-semibold text-slate-900">{{ $center->center_name }}</p>
                                    <p class="mt-1 text-xs text-slate-400">Center #{{ $center->id }}</p>
                                </td>

                                <td class="px-5 py-4 text-slate-600">
                                    <p>{{ $center->address }}</p>
                                    <p class="mt-1 text-xs text-slate-400">
                                        {{ $center->purok ? $center->purok.', ' : '' }}{{ $center->barangay }}
                                    </p>
                                </td>

                                <td class="px-5 py-4">
                                    <p class="text-slate-700">{{ $center->contact_person ?: 'Not provided' }}</p>
                                    <p class="mt-1 text-xs text-slate-400">
                                        {{ $center->contact_number ?: 'No contact number' }}
                                    </p>
                                </td>

                                <td class="px-5 py-4 font-semibold text-slate-700">
                                    {{ number_format($center->capacity) }} persons
                                </td>

                                <td class="px-5 py-4">
                                    <p class="font-semibold text-slate-800">
                                        {{ number_format($center->current_occupants) }}
                                        <span class="text-xs font-normal text-slate-400">
                                            / {{ number_format($center->capacity) }}
                                        </span>
                                    </p>
                                    <p class="mt-1 text-xs text-slate-400">Recorded evacuees</p>
                                </td>

                                <td class="px-5 py-4">
                                    @if($center->status === 'Active')
                                        <span class="inline-flex rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">
                                            {{ number_format($center->available_slots) }} available
                                        </span>
                                    @else
                                        <span class="inline-flex rounded-full bg-orange-50 px-3 py-1 text-xs font-semibold text-orange-700">
                                            0 available
                                        </span>
                                        <p class="mt-1 text-xs text-slate-400">Not accepting new evacuees</p>
                                    @endif
                                </td>

                                <td class="max-w-[190px] px-5 py-4 text-slate-600">
                                    <span class="line-clamp-2">
                                        {{ $center->facilities ?: 'No facilities listed' }}
                                    </span>
                                </td>

                                <td class="px-5 py-4">
                                    @if($center->status === 'Active')
                                        <span class="inline-flex rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">Active</span>
                                    @elseif($center->status === 'Inactive')
                                        <span class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">Inactive</span>
                                    @else
                                        <span class="inline-flex rounded-full bg-orange-50 px-3 py-1 text-xs font-semibold text-orange-700">Under Maintenance</span>
                                    @endif
                                </td>

                                <td class="px-5 py-4">
                                    <div class="flex justify-end gap-2">
                                        <button type="button"
                                            onclick="openEditModal(this)"
                                            data-id="{{ $center->id }}"
                                            data-name="{{ $center->center_name }}"
                                            data-address="{{ $center->address }}"
                                            data-purok="{{ $center->purok }}"
                                            data-barangay="{{ $center->barangay }}"
                                            data-contact-person="{{ $center->contact_person }}"
                                            data-contact-number="{{ $center->contact_number }}"
                                            data-capacity="{{ $center->capacity }}"
                                            data-facilities="{{ $center->facilities }}"
                                            data-latitude="{{ $center->latitude }}"
                                            data-longitude="{{ $center->longitude }}"
                                            data-status="{{ $center->status }}"
                                            class="rounded-lg bg-orange-50 px-3 py-2 text-xs font-semibold text-orange-700 transition hover:bg-orange-100">
                                            Edit
                                        </button>

                                        <button type="button"
                                            onclick="openDeleteCenterModal(this)"
                                            data-action="{{ route('evacuation-centers.destroy', $center) }}"
                                            data-center-name="{{ $center->center_name }}"
                                            class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-5 py-14 text-center">
                                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-slate-400">
                                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V7l7-4 7 4v14"/>
                                        </svg>
                                    </div>
                                    <h3 class="mt-4 text-sm font-bold text-slate-800">No evacuation centers yet</h3>
                                    <p class="mt-1 text-sm text-slate-500">
                                        Select Add Evacuation Center to register your first facility.
                                    </p>
                                </td>
                            </tr>
                        @endforelse

                        <tr id="noSearchResults" class="hidden">
                            <td colspan="9" class="px-5 py-12 text-center">
                                <p class="text-sm font-semibold text-slate-800">No matching evacuation centers found</p>
                                <p class="mt-1 text-sm text-slate-500">Try changing your search or status filter.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex flex-col gap-2 border-t border-slate-200 bg-slate-50 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-xs text-slate-500">
                    Showing <span id="visibleCenterCount" class="font-bold text-slate-700">{{ $totalCenters }}</span>
                    of <span class="font-bold text-slate-700">{{ $totalCenters }}</span> registered centers
                </p>
                <p class="text-xs text-slate-400">HERMIS Evacuation Center Management</p>
            </div>
        </div>
    </section>

    {{-- ADD CENTER MODAL --}}
    <div id="addModal" class="modal-backdrop fixed inset-0 z-[100] hidden items-center justify-center overflow-y-auto bg-slate-950/60 p-4 backdrop-blur-sm">
        <div class="my-auto w-full max-w-2xl overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl">

            <div class="flex items-center justify-between bg-[#0F172A] px-6 py-5 text-white">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-orange-400">Center Management</p>
                    <h3 class="mt-1 text-lg font-bold">Add Evacuation Center</h3>
                    <p class="mt-1 text-xs text-slate-300">Register a new evacuation facility</p>
                </div>
                <button type="button" onclick="closeModal('addModal')"
                    class="flex h-9 w-9 items-center justify-center rounded-lg text-slate-300 transition hover:bg-white/10 hover:text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" d="m6 6 12 12M18 6 6 18"/>
                    </svg>
                </button>
            </div>

            <form method="POST" action="{{ route('evacuation-centers.store') }}" class="p-6">
                @csrf

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">
                            Center Name <span class="text-red-500">*</span>
                        </label>
                        <input class="center-field" name="center_name" required maxlength="255"
                            placeholder="e.g. Anoling Barangay Hall">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">
                            Complete Address <span class="text-red-500">*</span>
                        </label>
                        <input class="center-field" name="address" required maxlength="255"
                            placeholder="Enter center address">
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">Purok</label>
                        <input class="center-field" name="purok" maxlength="100" placeholder="e.g. Purok 1">
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">
                            Barangay <span class="text-red-500">*</span>
                        </label>
                        <input class="center-field" name="barangay" required maxlength="255" value="Anoling">
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">Contact Person</label>
                        <input class="center-field" name="contact_person" maxlength="255"
                            placeholder="Name of person in charge">
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">Contact Number</label>
                        <input class="center-field" name="contact_number" maxlength="20" placeholder="09XXXXXXXXX">
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">
                            Maximum Capacity <span class="text-red-500">*</span>
                        </label>
                        <input class="center-field" type="number" name="capacity" min="1" required
                            placeholder="Number of persons">
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">
                            Center Status <span class="text-red-500">*</span>
                        </label>
                        <select class="center-field" name="status" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Under Maintenance">Under Maintenance</option>
                        </select>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">Available Facilities</label>
                        <textarea class="center-field" name="facilities" rows="2"
                            placeholder="e.g. Water supply, comfort rooms, electricity, first aid"></textarea>
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">Latitude (optional)</label>
                        <input class="center-field" type="number" step="any" name="latitude" placeholder="e.g. 13.18">
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">Longitude (optional)</label>
                        <input class="center-field" type="number" step="any" name="longitude" placeholder="e.g. 123.68">
                    </div>
                </div>

                <div class="mt-6 flex flex-col-reverse gap-3 border-t border-slate-200 pt-5 sm:flex-row sm:justify-end">
                    <button type="button" onclick="closeModal('addModal')"
                        class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50">
                        Cancel
                    </button>
                    <button type="submit"
                        class="rounded-lg bg-[#EA580C] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#C2410C]">
                        Save Center
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- EDIT CENTER MODAL --}}
    <div id="editModal" class="modal-backdrop fixed inset-0 z-[100] hidden items-center justify-center overflow-y-auto bg-slate-950/60 p-4 backdrop-blur-sm">
        <div class="my-auto w-full max-w-2xl overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl">

            <div class="flex items-center justify-between bg-[#0F172A] px-6 py-5 text-white">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-orange-400">Center Management</p>
                    <h3 class="mt-1 text-lg font-bold">Update Evacuation Center</h3>
                    <p id="editCenterSubtitle" class="mt-1 text-xs text-slate-300">Edit center information</p>
                </div>
                <button type="button" onclick="closeModal('editModal')"
                    class="flex h-9 w-9 items-center justify-center rounded-lg text-slate-300 transition hover:bg-white/10 hover:text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" d="m6 6 12 12M18 6 6 18"/>
                    </svg>
                </button>
            </div>

            <form id="editCenterForm" method="POST" action="" class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">
                            Center Name <span class="text-red-500">*</span>
                        </label>
                        <input class="center-field" name="center_name" required maxlength="255">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">
                            Complete Address <span class="text-red-500">*</span>
                        </label>
                        <input class="center-field" name="address" required maxlength="255">
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">Purok</label>
                        <input class="center-field" name="purok" maxlength="100">
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">
                            Barangay <span class="text-red-500">*</span>
                        </label>
                        <input class="center-field" name="barangay" required maxlength="255">
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">Contact Person</label>
                        <input class="center-field" name="contact_person" maxlength="255">
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">Contact Number</label>
                        <input class="center-field" name="contact_number" maxlength="20">
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">
                            Maximum Capacity <span class="text-red-500">*</span>
                        </label>
                        <input class="center-field" type="number" name="capacity" min="1" required>
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">
                            Center Status <span class="text-red-500">*</span>
                        </label>
                        <select class="center-field" name="status" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Under Maintenance">Under Maintenance</option>
                        </select>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">Available Facilities</label>
                        <textarea class="center-field" name="facilities" rows="2"></textarea>
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">Latitude (optional)</label>
                        <input class="center-field" type="number" step="any" name="latitude">
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-semibold text-slate-700">Longitude (optional)</label>
                        <input class="center-field" type="number" step="any" name="longitude">
                    </div>
                </div>

                <div class="mt-6 flex flex-col-reverse gap-3 border-t border-slate-200 pt-5 sm:flex-row sm:justify-end">
                    <button type="button" onclick="closeModal('editModal')"
                        class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50">
                        Cancel
                    </button>
                    <button type="submit"
                        class="rounded-lg bg-[#EA580C] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#C2410C]">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- DELETE EVACUATION CENTER CONFIRMATION MODAL --}}
    <div id="deleteCenterModal"
        class="modal-backdrop fixed inset-0 z-[120] hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm"
        aria-hidden="true">
        <div role="dialog" aria-modal="true"
            aria-labelledby="deleteCenterModalTitle"
            aria-describedby="deleteCenterModalDescription"
            class="w-full max-w-sm overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl">

            <div class="px-6 pb-5 pt-6 text-center">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-orange-50 text-[#EA580C]">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M4 7h16"/>
                        <path d="M10 11v6m4-6v6"/>
                        <path d="M6 7l1 13h10l1-13"/>
                        <path d="M9 7V4h6v3"/>
                    </svg>
                </div>

                <h2 id="deleteCenterModalTitle" class="text-lg font-extrabold text-[#0F172A]">
                    Confirm Delete
                </h2>

                <p id="deleteCenterModalDescription" class="mt-2 text-sm leading-relaxed text-slate-500">
                    Are you sure you want to delete this evacuation center? This action cannot be undone.
                </p>

                <p id="deleteCenterName" class="mt-3 rounded-lg border border-slate-200 bg-slate-50 px-3 py-2 text-sm font-bold text-slate-700"></p>

                <div class="mt-6 flex flex-col-reverse justify-center gap-2 sm:flex-row">
                    <button type="button" id="cancelDeleteCenter"
                        class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-300">
                        Cancel
                    </button>

                    <form id="deleteCenterForm" method="POST" action="" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex w-full items-center justify-center rounded-xl bg-[#EA580C] px-5 py-2.5 text-sm font-bold text-white shadow-sm transition hover:bg-[#C2410C] focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 sm:w-auto">
                            Yes, Delete Center
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- PAGE STYLES --}}
    <style>
        .center-field {
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: .55rem;
            background: #fff;
            padding: .7rem .85rem;
            font-size: .875rem;
            color: #334155;
            outline: none;
            transition: .18s;
        }

        .center-field:focus {
            border-color: #ea580c;
            box-shadow: 0 0 0 2px rgba(234, 88, 12, .10);
        }

        .modal-backdrop {
            background: rgba(15, 23, 42, .60);
        }

        /*
         * Directly blur the two HERMIS application regions while the
         * Delete Center modal is open. The modal is appended to document.body,
         * outside these regions, so the confirmation box stays sharp.
         */
        body.evacuation-center-delete-open .hermis-sidebar,
        body.evacuation-center-delete-open .hermis-main-content {
            filter: blur(4px);
            pointer-events: none;
            user-select: none;
            transition: filter .18s ease;
        }
    </style>

    {{-- PAGE JAVASCRIPT --}}
    <script>
        function openAddModal() {
            const modal = document.getElementById('addModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            if (!modal) return;

            modal.classList.add('hidden');
            modal.classList.remove('flex');

            if (id === 'deleteCenterModal') {
                document.body.classList.remove('evacuation-center-delete-open');
            }

            if (!document.querySelector('.modal-backdrop.flex')) {
                document.body.style.overflow = '';
            }
        }

        function openEditModal(button) {
            const id = button.dataset.id;
            const form = document.getElementById('editCenterForm');

            form.action = `/evacuation-centers/${id}`;

            const fields = {
                center_name: button.dataset.name,
                address: button.dataset.address,
                purok: button.dataset.purok,
                barangay: button.dataset.barangay,
                contact_person: button.dataset.contactPerson,
                contact_number: button.dataset.contactNumber,
                capacity: button.dataset.capacity,
                facilities: button.dataset.facilities,
                latitude: button.dataset.latitude,
                longitude: button.dataset.longitude,
                status: button.dataset.status
            };

            Object.entries(fields).forEach(([name, value]) => {
                const input = form.querySelector(`[name="${name}"]`);
                if (input) input.value = value ?? '';
            });

            document.getElementById('editCenterSubtitle').textContent = button.dataset.name;

            const modal = document.getElementById('editModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function openDeleteCenterModal(button) {
            const modal = document.getElementById('deleteCenterModal');
            const form = document.getElementById('deleteCenterForm');
            const name = document.getElementById('deleteCenterName');
            const cancelButton = document.getElementById('cancelDeleteCenter');

            if (!modal || !form || !name) return;

            form.action = button.dataset.action || '';
            name.textContent = button.dataset.centerName || 'Selected evacuation center';

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            modal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
            document.body.classList.add('evacuation-center-delete-open');

            if (cancelButton) cancelButton.focus();
        }

        function filterCenters() {
            const searchInput = document.getElementById('centerSearch');
            const statusFilter = document.getElementById('statusFilter');

            const search = searchInput.value.trim().toLowerCase();
            const status = statusFilter.value;

            const rows = [...document.querySelectorAll('.center-row')];
            let visible = 0;

            rows.forEach(row => {
                const matchesSearch = (row.dataset.search || '').includes(search);
                const matchesStatus = !status || row.dataset.status === status;
                const show = matchesSearch && matchesStatus;

                row.classList.toggle('hidden', !show);

                if (show) visible++;
            });

            const count = document.getElementById('visibleCenterCount');
            const noResults = document.getElementById('noSearchResults');

            if (count) count.textContent = visible;

            if (noResults) {
                noResults.classList.toggle('hidden', visible !== 0 || rows.length === 0);
            }
        }

        function resetCenterFilters() {
            document.getElementById('centerSearch').value = '';
            document.getElementById('statusFilter').value = '';
            filterCenters();
        }

        document.addEventListener('DOMContentLoaded', function () {
            /*
             * Keep the Delete Center modal at the document root.
             * This lets its full-screen backdrop cover the sidebar, topbar,
             * and page content together, without blurring the modal itself.
             */
            const deleteCenterModal = document.getElementById('deleteCenterModal');

            if (deleteCenterModal && deleteCenterModal.parentElement !== document.body) {
                document.body.appendChild(deleteCenterModal);
            }

            const search = document.getElementById('centerSearch');
            const status = document.getElementById('statusFilter');

            if (search) {
                search.addEventListener('input', filterCenters);
            }

            if (status) {
                status.addEventListener('change', filterCenters);
            }

            const cancelDeleteButton = document.getElementById('cancelDeleteCenter');

            if (cancelDeleteButton) {
                cancelDeleteButton.addEventListener('click', function () {
                    closeModal('deleteCenterModal');
                });
            }

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                    closeModal('addModal');
                    closeModal('editModal');
                    closeModal('deleteCenterModal');
                }
            });

            ['addModal', 'editModal', 'deleteCenterModal'].forEach(id => {
                const modal = document.getElementById(id);

                if (modal) {
                    modal.addEventListener('click', function (event) {
                        if (event.target === modal) {
                            closeModal(id);
                        }
                    });
                }
            });
        });
    </script>
</x-app-layout>
