
<x-app-layout>

    <div class="mx-auto max-w-[1600px] space-y-7 px-1 pb-10">

        {{-- Dashboard Heading --}}
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
                    Overview
                </p>
                <h1 class="mt-1 text-3xl font-extrabold tracking-tight text-[#0F172A] sm:text-4xl">
                    Dashboard
                </h1>
                <p class="mt-2 text-sm text-slate-500">
                    Welcome to HERMIS. Manage household and evacuation information.
                </p>
            </div>
            </div>
        </section>


        {{-- Summary Statistics --}}
        <section class="pt-1">
            <div class="mb-5 border-l-4 border-[#EA580C] pl-4">
                <h2 class="text-lg font-bold text-[#0F172A]">System Overview</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Summary of registered households and community resources.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

                {{-- Total Households --}}
                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A !important;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%) !important;color:#FFFFFF !important;">
                    <div class="flex items-center justify-between">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M3 10l9-7 9 7v10a1 1 0 01-1 1h-6v-6h-4v6H4a1 1 0 01-1-1V10z"/>
                            </svg>
                        </div>
                        <span class="rounded-full border border-white/15 bg-white/10 px-3 py-1 text-[11px] font-bold uppercase tracking-wide text-slate-100">
                            Households
                        </span>
                    </div>

                    <p class="mt-5 text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">Total Households</p>
                    <h3 class="mt-1 text-3xl font-extrabold text-white" style="color:#FFFFFF !important;">
                        {{ number_format($totalHouseholds) }}
                    </h3>
                    <p class="mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Registered households</p>
                </div>


                {{-- Total Residents --}}
                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A !important;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%) !important;color:#FFFFFF !important;">
                    <div class="flex items-center justify-between">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-sky-500/20 text-sky-100 ring-4 ring-white/10">
                            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m8-10a4 4 0 100-8 4 4 0 000 8zm12 10v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                            </svg>
                        </div>
                        <span class="rounded-full border border-white/15 bg-white/10 px-3 py-1 text-[11px] font-bold uppercase tracking-wide text-slate-100">
                            Residents
                        </span>
                    </div>

                    <p class="mt-5 text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">Total Residents</p>
                    <h3 class="mt-1 text-3xl font-extrabold text-white" style="color:#FFFFFF !important;">
                        {{ number_format($totalResidents) }}
                    </h3>
                    <p class="mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Registered individuals</p>
                </div>


                {{-- Active Centers --}}
                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A !important;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%) !important;color:#FFFFFF !important;">
                    <div class="flex items-center justify-between">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M3 21h18M5 21V7l8-4v18m0-13h6v13M8 9h2m-2 4h2m-2 4h2m7-2h2"/>
                            </svg>
                        </div>
                        <span class="rounded-full border border-green-300/20 bg-green-400/15 px-3 py-1 text-[11px] font-bold uppercase tracking-wide text-green-200">
                            Active
                        </span>
                    </div>

                    <p class="mt-5 text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">Active Evacuation Centers</p>
                    <h3 class="mt-1 text-3xl font-extrabold text-white" style="color:#FFFFFF !important;">
                        {{ number_format($activeCenters) }}
                    </h3>
                    <p class="mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Centers currently marked active</p>
                </div>


                {{-- High Risk Households --}}
                <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A !important;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%) !important;color:#FFFFFF !important;">
                    <div class="flex items-center justify-between">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M12 9v4m0 4h.01M10.3 3.86L2.7 17a2 2 0 001.73 3h15.14a2 2 0 001.73-3L13.7 3.86a2 2 0 00-3.46 0z"/>
                            </svg>
                        </div>
                        <span class="rounded-full border border-orange-300/20 bg-orange-400/15 px-3 py-1 text-[11px] font-bold uppercase tracking-wide text-orange-200">
                            Priority
                        </span>
                    </div>

                    <p class="mt-5 text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">High-Risk Households</p>
                    <h3 class="mt-1 text-3xl font-extrabold text-orange-300" style="color:#FDBA74 !important;">
                        {{ number_format($highRiskHouseholds) }}
                    </h3>
                    <p class="mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Households needing priority</p>
                </div>

            </div>
        </section>


        {{-- Management banner removed to keep the dashboard clean and focused. -->


        {{-- Evacuation Overview --}}
        <section class="pt-1">
            <div class="mb-5 border-l-4 border-[#EA580C] pl-4">
                <h2 class="text-xl font-bold text-[#0F172A]">Evacuation Overview</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Current household evacuation status and evacuee statistics.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

                {{-- Evacuated Households --}}
                <div class="relative overflow-hidden rounded-2xl border border-emerald-100 bg-gradient-to-br from-white to-emerald-50/70 p-6 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md before:absolute before:inset-y-0 before:left-0 before:w-1 before:bg-emerald-500">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-slate-600">Evacuated Households</p>
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-green-50 text-green-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M5 13l4 4L19 7"/>
                            </svg>
                        </span>
                    </div>

                    <h3 class="mt-4 text-3xl font-extrabold text-green-600">
                        {{ number_format($totalEvacuated) }}
                    </h3>
                    <p class="mt-2 text-xs text-slate-400">Households already evacuated</p>
                </div>


                {{-- Total Evacuees --}}
                <div class="relative overflow-hidden rounded-2xl border border-blue-100 bg-gradient-to-br from-white to-blue-50/70 p-6 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md before:absolute before:inset-y-0 before:left-0 before:w-1 before:bg-blue-500">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-slate-600">Total Evacuees</p>
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m8-10a4 4 0 100-8 4 4 0 000 8zm12 10v-2a4 4 0 00-3-3.87"/>
                            </svg>
                        </span>
                    </div>

                    <h3 class="mt-4 text-3xl font-extrabold text-blue-600">
                        {{ number_format($totalEvacuees) }}
                    </h3>
                    <p class="mt-2 text-xs text-slate-400">Individuals currently evacuated</p>
                </div>


                {{-- For Evacuation --}}
                <div class="relative overflow-hidden rounded-2xl border border-orange-100 bg-gradient-to-br from-white to-orange-50/70 p-6 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md before:absolute before:inset-y-0 before:left-0 before:w-1 before:bg-[#EA580C]">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-slate-600">For Evacuation</p>
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-orange-50 text-[#EA580C]">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12 8v5m0 4h.01"/>
                                <path d="M10.3 3.86L2.7 17a2 2 0 001.73 3h15.14a2 2 0 001.73-3L13.7 3.86a2 2 0 00-3.4 0z"/>
                            </svg>
                        </span>
                    </div>

                    <h3 class="mt-4 text-3xl font-extrabold text-[#EA580C]">
                        {{ number_format($totalForEvacuation) }}
                    </h3>
                    <p class="mt-2 text-xs text-slate-400">Households awaiting evacuation</p>
                </div>


                {{-- Returned Home --}}
                <div class="relative overflow-hidden rounded-2xl border border-slate-200 bg-gradient-to-br from-white to-slate-100/80 p-6 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md before:absolute before:inset-y-0 before:left-0 before:w-1 before:bg-slate-400">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-slate-600">Returned Home</p>
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-slate-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M9 14l-4-4 4-4"/>
                                <path d="M5 10h9a5 5 0 010 10h-2"/>
                            </svg>
                        </span>
                    </div>

                    <h3 class="mt-4 text-3xl font-extrabold text-slate-700">
                        {{ number_format($totalReturnedHome) }}
                    </h3>
                    <p class="mt-2 text-xs text-slate-400">Households that returned home</p>
                </div>

            </div>
        </section>


        {{-- Recent Evacuation Activities --}}
        <section class="mt-2 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_4px_18px_rgba(15,23,42,0.06)]">

            <div class="flex flex-col justify-between gap-4 border-b border-slate-100 bg-gradient-to-r from-white via-white to-orange-50/60 p-6 sm:flex-row sm:items-center">
                <div>
                    <h2 class="flex items-center gap-3 text-xl font-bold text-[#0F172A]">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="17" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                        </span>
                        Recent Evacuation Activities
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Latest recorded household evacuation information.
                    </p>
                </div>

                <a href="{{ route('evacuation-monitoring.index') }}"
                    class="inline-flex items-center gap-2 rounded-xl border border-orange-200 bg-orange-50 px-4 py-2.5 text-sm font-bold text-[#C2410C] transition hover:border-[#EA580C] hover:bg-[#EA580C] hover:text-white">
                    View Evacuation Monitoring
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M5 12h14m-7-7l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[850px] text-left text-sm">

                    <thead class="bg-[#0F172A] text-xs uppercase tracking-wider text-white">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Household Head</th>
                            <th class="px-6 py-4 font-semibold">Purok</th>
                            <th class="px-6 py-4 font-semibold">Evacuation Center</th>
                            <th class="px-6 py-4 font-semibold">Evacuees</th>
                            <th class="px-6 py-4 font-semibold">Status</th>
                            <th class="px-6 py-4 font-semibold">Date Recorded</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse($recentEvacuations as $evacuation)

                            @php
                                $status = $evacuation->evacuation_status;

                                $statusClass = match ($status) {
                                    'Evacuated' => 'bg-green-50 text-green-700 ring-green-600/20',
                                    'For Evacuation' => 'bg-orange-50 text-orange-700 ring-orange-600/20',
                                    'Returned Home' => 'bg-blue-50 text-blue-700 ring-blue-600/20',
                                    default => 'bg-slate-100 text-slate-600 ring-slate-500/20',
                                };
                            @endphp

                            <tr class="transition duration-150 odd:bg-white even:bg-slate-50/70 hover:bg-orange-50/70">

                                <td class="whitespace-nowrap px-6 py-4 font-semibold text-[#0F172A]">
                                    {{ $evacuation->household?->household_head ?? 'Household not found' }}
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-slate-600">
                                    {{ $evacuation->household?->purok ?? '—' }}
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-slate-600">
                                    {{ $evacuation->evacuation_center ?? '—' }}
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 font-medium text-slate-700">
                                    {{ number_format($evacuation->evacuees_count) }}
                                </td>

                                <td class="whitespace-nowrap px-6 py-4">
                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold ring-1 ring-inset {{ $statusClass }}">
                                        {{ $status }}
                                    </span>
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-slate-500">
                                    {{ $evacuation->updated_at?->format('M d, Y h:i A') ?? '—' }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="px-6 py-14 text-center">
                                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-slate-400">
                                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>

                                    <p class="mt-4 font-semibold text-slate-700">
                                        No evacuation activities yet.
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        Recorded evacuation activities will appear here.
                                    </p>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>

        </section>

    </div>

</x-app-layout>
