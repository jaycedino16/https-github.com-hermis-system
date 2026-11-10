<x-app-layout>

    <section class="mx-auto max-w-[1600px] space-y-6 px-1 pb-10">

        {{-- PAGE HEADER: MATCHES HERMIS DASHBOARD --}}
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

            <div class="relative flex flex-col justify-between gap-5 sm:flex-row sm:items-center">
                <div>
                    <p class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.18em] text-[#EA580C]">
                        <span class="h-2 w-2 rounded-full bg-[#EA580C] shadow-[0_0_0_4px_rgba(234,88,12,0.12)]"></span>
                        Management / Households / Household Details
                    </p>
                    <h1 class="mt-1 text-3xl font-extrabold tracking-tight text-[#0F172A] sm:text-4xl">
                        Household Details
                    </h1>
                    <p class="mt-2 text-sm text-slate-500">
                        View the complete registered household information and risk assessment.
                    </p>
                </div>

                <div class="relative flex shrink-0 flex-wrap items-center gap-3">
                    <a href="{{ route('households.index') }}"
                       class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm font-bold text-slate-700 shadow-sm transition hover:border-slate-400 hover:bg-slate-50 focus:outline-none focus:ring-4 focus:ring-slate-200">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 18l-6-6 6-6M9 12h12"/>
                        </svg>
                        Back to Households
                    </a>

                    <a href="{{ route('households.edit', $household->id) }}"
                       class="inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-bold text-white shadow-lg shadow-orange-600/20 transition duration-200 hover:-translate-y-0.5 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-orange-200"
                       style="background:#EA580C !important;color:#FFFFFF !important;"
                       onmouseover="this.style.backgroundColor='#C2410C'"
                       onmouseout="this.style.backgroundColor='#EA580C'">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l2.651 2.651M8 16l8.9-8.9a2.1 2.1 0 0 1 2.97 2.97L11 19H8v-3z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 20h14"/>
                        </svg>
                        Edit Household
                    </a>
                </div>
            </div>
        </section>

        {{-- HOUSEHOLD PROFILE --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_5px_18px_rgba(15,23,42,0.06)]">

            {{-- PROFILE CARD HEADER --}}
            <div class="flex flex-col gap-4 border-b border-slate-200 bg-gradient-to-r from-white via-white to-orange-50/60 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                <div class="flex min-w-0 items-center gap-3">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white shadow-md shadow-orange-600/20">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10.5 12 3l9 7.5V20a1 1 0 0 1-1 1h-6v-6h-4v6H4a1 1 0 0 1-1-1v-9.5Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 11h.01M16 11h.01"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-[11px] font-bold uppercase tracking-[0.16em] text-[#EA580C]">
                            Household Profile
                        </p>
                        <h2 class="mt-0.5 truncate text-xl font-extrabold text-[#0F172A]">
                            {{ $household->household_head }}
                        </h2>
                        <p class="mt-0.5 text-sm text-slate-500">Household Head</p>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-2 sm:justify-end">
                    @if ($household->risk_level === 'High')
                        <span class="inline-flex items-center gap-1.5 rounded-full border border-red-100 bg-red-50 px-3 py-1.5 text-xs font-bold text-red-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                            High Risk
                        </span>
                    @elseif ($household->risk_level === 'Moderate')
                        <span class="inline-flex items-center gap-1.5 rounded-full border border-orange-100 bg-orange-50 px-3 py-1.5 text-xs font-bold text-orange-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-[#EA580C]"></span>
                            Moderate Risk
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 rounded-full border border-green-100 bg-green-50 px-3 py-1.5 text-xs font-bold text-green-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                            {{ $household->risk_level }} Risk
                        </span>
                    @endif

                    <span class="inline-flex items-center gap-1.5 rounded-full border border-blue-100 bg-blue-50 px-3 py-1.5 text-xs font-bold text-blue-700">
                        <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                        {{ $household->status }}
                    </span>
                </div>
            </div>

            {{-- BASIC HOUSEHOLD INFORMATION --}}
            <div class="p-5 sm:p-6">
                <div class="mb-5 flex items-center gap-3">
                    <div class="h-7 w-1 rounded-full bg-[#EA580C]"></div>
                    <div>
                        <h3 class="text-base font-extrabold text-[#0F172A]">Basic Household Information</h3>
                        <p class="mt-0.5 text-xs text-slate-500">Registered household and contact details.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 xl:grid-cols-3">

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">Household Head</p>
                        <p class="mt-2 break-words text-sm font-bold text-[#0F172A]">{{ $household->household_head }}</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">Contact Number</p>
                        <p class="mt-2 break-words text-sm font-bold text-[#0F172A]">{{ $household->contact_number ?: 'Not provided' }}</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">Purok</p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">{{ $household->purok }}</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">Barangay</p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">{{ $household->barangay }}</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">Number of Family Members</p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">{{ $household->members }}</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">Risk Level</p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">{{ $household->risk_level }}</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">Registration Status</p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">{{ $household->status }}</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">Date Registered</p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">
                            {{ $household->created_at ? $household->created_at->format('F d, Y') : 'Not available' }}
                        </p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">Last Updated</p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">
                            {{ $household->updated_at ? $household->updated_at->format('F d, Y') : 'Not available' }}
                        </p>
                    </div>

                </div>
            </div>
        </section>

        {{-- HOUSEHOLD RISK ASSESSMENT --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_5px_18px_rgba(15,23,42,0.06)]">

            <div class="flex items-center gap-3 border-b border-slate-200 bg-gradient-to-r from-white via-white to-orange-50/60 px-5 py-4 sm:px-6">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-orange-50 text-[#EA580C] ring-1 ring-orange-100">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3 3.8 7v5.2c0 4.6 3.2 7.8 8.2 9.8 5-2 8.2-5.2 8.2-9.8V7L12 3Z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-extrabold text-[#0F172A]">Household Risk Assessment</h3>
                    <p class="mt-0.5 text-sm text-slate-500">Risk assessment information recorded for this household.</p>
                </div>
            </div>

            <div class="p-5 sm:p-6">
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 xl:grid-cols-3">

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">Hazard Exposure</p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">{{ $household->hazard_exposure ?: 'Not assessed' }}</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">Distance from Hazard</p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">{{ $household->distance_from_hazard ?: 'Not assessed' }}</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">Vulnerable Members</p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">{{ $household->vulnerable_members ?? 'Not assessed' }}</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">House Condition</p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">{{ $household->house_condition ?: 'Not assessed' }}</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">Evacuation Accessibility</p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">{{ $household->evacuation_accessibility ?: 'Not assessed' }}</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">Risk Score</p>
                        <p class="mt-2 text-sm font-extrabold text-[#0F172A]">{{ $household->risk_score !== null ? $household->risk_score : 'Not assessed' }}</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4 sm:col-span-2 xl:col-span-1">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">Last Risk Assessment</p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">
                            {{ $household->risk_assessed_at ? $household->risk_assessed_at->format('F d, Y h:i A') : 'Not assessed' }}
                        </p>
                    </div>

                </div>
            </div>
        </section>

        {{-- BOTTOM NAVIGATION --}}
        <div class="flex justify-end">
            <a href="{{ route('households.index') }}"
               class="inline-flex items-center gap-2 rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm font-bold text-slate-700 shadow-sm transition hover:border-slate-400 hover:bg-slate-50 focus:outline-none focus:ring-4 focus:ring-slate-200">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 18l-6-6 6-6M9 12h12"/>
                </svg>
                Back to Household Directory
            </a>
        </div>

    </section>

</x-app-layout>
