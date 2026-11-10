
<x-app-layout>

    <section class="mx-auto max-w-[1600px] space-y-6 px-1 pb-10">

        {{-- PAGE HEADER --}}
        <section class="relative isolate min-h-[150px] overflow-hidden rounded-2xl border border-slate-200 bg-gradient-to-r from-white via-slate-50 to-orange-50 px-6 py-6 shadow-sm sm:px-7">
            <div class="pointer-events-none absolute inset-y-0 right-0 w-[58%] opacity-90">
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

            <div class="relative">
                <p class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.18em] text-[#EA580C]">
                    <span class="h-2 w-2 rounded-full bg-[#EA580C] shadow-[0_0_0_4px_rgba(234,88,12,0.12)]"></span>
                    HERMIS / System Information / About
                </p>

                <h1 class="mt-1 text-3xl font-extrabold tracking-tight text-[#0F172A] sm:text-4xl">
                    About HERMIS
                </h1>

                <p class="mt-2 max-w-2xl text-sm text-slate-500">
                    Learn about the system, its purpose, and the tools provided for household evacuation and risk management.
                </p>
            </div>
        </section>


        {{-- SYSTEM PROFILE --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_5px_18px_rgba(15,23,42,0.06)]">

            <div class="flex flex-col gap-4 border-b border-slate-200 bg-gradient-to-r from-white via-white to-orange-50/60 px-5 py-5 sm:flex-row sm:items-center sm:px-6">

                <div class="flex min-w-0 items-center gap-3">

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white shadow-md shadow-orange-600/20">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 12 2 2 4-4"/>
                        </svg>
                    </div>

                    <div class="min-w-0">
                        <p class="text-[11px] font-bold uppercase tracking-[0.16em] text-[#EA580C]">
                            System Profile
                        </p>
                        <h2 class="mt-0.5 text-xl font-extrabold text-[#0F172A]">
                            HERMIS
                        </h2>
                        <p class="mt-0.5 text-sm text-slate-500">
                            Household Evacuation and Risk Management Information System
                        </p>
                    </div>

                </div>

                <div class="sm:ml-auto">
                    <span class="inline-flex items-center gap-1.5 rounded-full border border-green-100 bg-green-50 px-3 py-1.5 text-xs font-bold text-green-700">
                        <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                        System Version 1.0.0
                    </span>
                </div>

            </div>

            <div class="p-5 sm:p-6">

                <div class="mb-5 flex items-center gap-3">
                    <div class="h-7 w-1 rounded-full bg-[#EA580C]"></div>
                    <div>
                        <h3 class="text-base font-extrabold text-[#0F172A]">
                            About the System
                        </h3>
                        <p class="mt-0.5 text-xs text-slate-500">
                            System overview and intended use.
                        </p>
                    </div>
                </div>

                <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4 sm:p-5">
                    <p class="text-sm leading-7 text-slate-700">
                        The
                        <strong class="font-extrabold text-[#0F172A]">
                            Household Evacuation and Risk Management Information System (HERMIS)
                        </strong>
                        is a web-based system intended to support household information management,
                        risk monitoring, and evacuation-related operations in
                        <strong class="font-bold text-[#0F172A]">
                            Barangay Anoling, Camalig, Albay
                        </strong>.
                        It brings essential household and emergency-management records into one
                        system to help authorized users access information and monitor recorded activities.
                    </p>
                </div>

            </div>
        </section>


        {{-- SYSTEM PURPOSE --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_5px_18px_rgba(15,23,42,0.06)]">

            <div class="border-b border-slate-200 bg-gradient-to-r from-white via-white to-orange-50/60 px-5 py-4 sm:px-6">
                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white shadow-md shadow-orange-600/20">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                            <circle cx="12" cy="12" r="5"/>
                            <path stroke-linecap="round" d="M12 3v2m0 14v2M3 12h2m14 0h2"/>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-base font-extrabold text-[#0F172A]">
                            System Purpose
                        </h2>
                        <p class="mt-0.5 text-xs text-slate-500">
                            What HERMIS is designed to support.
                        </p>
                    </div>

                </div>
            </div>

            <div class="p-5 sm:p-6">

                <div class="mb-5 flex items-center gap-3">
                    <div class="h-7 w-1 rounded-full bg-[#EA580C]"></div>
                    <div>
                        <h3 class="text-base font-extrabold text-[#0F172A]">
                            Primary Objectives
                        </h3>
                        <p class="mt-0.5 text-xs text-slate-500">
                            Core purposes of the system.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-3">

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">
                            01 / Household Records
                        </p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">
                            Centralize household information
                        </p>
                        <p class="mt-1 text-xs leading-relaxed text-slate-500">
                            Maintain and view registered household details and related records.
                        </p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">
                            02 / Risk Monitoring
                        </p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">
                            Monitor household risk information
                        </p>
                        <p class="mt-1 text-xs leading-relaxed text-slate-500">
                            Review recorded risk assessments and identify households based on risk levels.
                        </p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">
                            03 / Evacuation Operations
                        </p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">
                            Support evacuation monitoring
                        </p>
                        <p class="mt-1 text-xs leading-relaxed text-slate-500">
                            Track recorded household evacuation status and evacuation-center information.
                        </p>
                    </div>

                </div>
            </div>
        </section>


        {{-- SYSTEM MODULES --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_5px_18px_rgba(15,23,42,0.06)]">

            <div class="border-b border-slate-200 bg-gradient-to-r from-white via-white to-orange-50/60 px-5 py-4 sm:px-6">
                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white shadow-md shadow-orange-600/20">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                            <rect x="3" y="3" width="7" height="7" rx="1"/>
                            <rect x="14" y="3" width="7" height="7" rx="1"/>
                            <rect x="3" y="14" width="7" height="7" rx="1"/>
                            <rect x="14" y="14" width="7" height="7" rx="1"/>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-base font-extrabold text-[#0F172A]">
                            System Modules
                        </h2>
                        <p class="mt-0.5 text-xs text-slate-500">
                            Main functions available in the HERMIS management portal.
                        </p>
                    </div>

                </div>
            </div>

            <div class="p-5 sm:p-6">

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 xl:grid-cols-3">

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-sm font-extrabold text-[#0F172A]">Dashboard</p>
                        <p class="mt-1 text-xs leading-relaxed text-slate-500">
                            Provides an overview of key household and evacuation information.
                        </p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-sm font-extrabold text-[#0F172A]">Household Management</p>
                        <p class="mt-1 text-xs leading-relaxed text-slate-500">
                            Manages registered household profiles and their recorded information.
                        </p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-sm font-extrabold text-[#0F172A]">Evacuation Monitoring</p>
                        <p class="mt-1 text-xs leading-relaxed text-slate-500">
                            Monitors household evacuation status and related evacuation records.
                        </p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-sm font-extrabold text-[#0F172A]">Evacuation Centers</p>
                        <p class="mt-1 text-xs leading-relaxed text-slate-500">
                            Maintains information about available evacuation centers.
                        </p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-sm font-extrabold text-[#0F172A]">Risk Monitoring</p>
                        <p class="mt-1 text-xs leading-relaxed text-slate-500">
                            Displays recorded household risk assessments and risk levels.
                        </p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-sm font-extrabold text-[#0F172A]">Hazard Alerts</p>
                        <p class="mt-1 text-xs leading-relaxed text-slate-500">
                            Manages hazard alerts and warning information entered in the system.
                        </p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4 sm:col-span-2 xl:col-span-1">
                        <p class="text-sm font-extrabold text-[#0F172A]">Reports</p>
                        <p class="mt-1 text-xs leading-relaxed text-slate-500">
                            Provides access to system reports based on available records.
                        </p>
                    </div>

                </div>
            </div>
        </section>


        {{-- SYSTEM INFORMATION --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_5px_18px_rgba(15,23,42,0.06)]">

            <div class="border-b border-slate-200 bg-gradient-to-r from-white via-white to-orange-50/60 px-5 py-4 sm:px-6">
                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white shadow-md shadow-orange-600/20">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                            <rect x="3" y="4" width="18" height="14" rx="2"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 22h8m-4-4v4"/>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-base font-extrabold text-[#0F172A]">
                            System Information
                        </h2>
                        <p class="mt-0.5 text-xs text-slate-500">
                            System identification and deployment coverage.
                        </p>
                    </div>

                </div>
            </div>

            <div class="p-5 sm:p-6">

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 xl:grid-cols-3">

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">System Name</p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">HERMIS</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">Version</p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">1.0.0</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">System Type</p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">Web-Based Management System</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4 sm:col-span-2 xl:col-span-3">
                        <p class="text-[11px] font-bold uppercase tracking-wide text-slate-500">Intended Coverage</p>
                        <p class="mt-2 text-sm font-bold text-[#0F172A]">
                            Barangay Anoling, Municipality of Camalig, Province of Albay
                        </p>
                    </div>

                </div>
            </div>
        </section>

    </section>

</x-app-layout>
