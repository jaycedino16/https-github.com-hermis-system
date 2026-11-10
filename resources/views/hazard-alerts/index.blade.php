<x-app-layout>

    @php
        $totalAlerts = $hazardAlerts->count();
        $activeAlerts = $hazardAlerts->where('status', 'Active')->count();
        $resolvedAlerts = $hazardAlerts->where('status', 'Resolved')->count();
        $expiredAlerts = $hazardAlerts->where('status', 'Expired')->count();
    @endphp

    <div id="hazardAlertsPageContent" class="mx-auto max-w-[1600px] space-y-7 px-1 pb-10">
        <section class="space-y-6">

            {{-- Page heading: same hero styling as the HERMIS Dashboard --}}
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
                            Monitoring / Hazard Alerts
                        </p>
                        <h1 class="mt-1 text-3xl font-extrabold tracking-tight text-[#0F172A] sm:text-4xl">
                            Hazard Alerts and Warnings
                        </h1>
                        <p class="mt-2 text-sm text-slate-500">
                            Create, monitor, and manage hazard alerts and warnings for affected communities.
                        </p>
                    </div>
                </div>
            </section>

            {{-- Success message --}}
            @if (session('success'))
                <div class="mb-5 rounded-xl border border-green-200 bg-green-50 px-5 py-3 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Validation errors --}}
            @if ($errors->any())
                <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-5 py-3 text-red-700">
                    <p class="mb-2 text-sm font-semibold">Please check the following:</p>
                    <ul class="list-disc space-y-1 pl-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Summary cards: same Dashboard V4 card styling --}}
            <section class="pt-1">
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

                    <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A !important;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%) !important;color:#FFFFFF !important;">
                        <div class="flex items-center justify-between">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M12 3 5.5 6v5.2c0 4.3 2.8 7.9 6.5 9.8 3.7-1.9 6.5-5.5 6.5-9.8V6L12 3Z"/>
                                    <path d="m9 12 2 2 4-4"/>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-5 text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">Total Alerts</p>
                        <h3 class="mt-1 text-3xl font-extrabold text-white" style="color:#FFFFFF !important;">{{ $totalAlerts }}</h3>
                        <p class="mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Recorded hazard alerts</p>
                    </div>

                    <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A !important;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%) !important;color:#FFFFFF !important;">
                        <div class="flex items-center justify-between">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M10.3 4.3 2.8 17.2A1.9 1.9 0 0 0 4.4 20h15.2a1.9 1.9 0 0 0 1.6-2.8L13.7 4.3a2 2 0 0 0-3.4 0Z"/>
                                    <path d="M12 9v4m0 3h.01"/>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-5 text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">Active Alerts</p>
                        <h3 class="mt-1 text-3xl font-extrabold text-white" style="color:#FFFFFF !important;">{{ $activeAlerts }}</h3>
                        <p class="mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Currently marked active</p>
                    </div>

                    <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A !important;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%) !important;color:#FFFFFF !important;">
                        <div class="flex items-center justify-between">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M20 11.2V12a8 8 0 1 1-4.7-7.3"/>
                                    <path d="m8.5 11.5 3 3L21 5"/>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-5 text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">Resolved Alerts</p>
                        <h3 class="mt-1 text-3xl font-extrabold text-white" style="color:#FFFFFF !important;">{{ $resolvedAlerts }}</h3>
                        <p class="mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Marked as resolved</p>
                    </div>

                    <div class="relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A !important;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%) !important;color:#FFFFFF !important;">
                        <div class="flex items-center justify-between">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="12" cy="12" r="9"/>
                                    <path d="M12 7v5l3 2"/>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-5 text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">Expired Alerts</p>
                        <h3 class="mt-1 text-3xl font-extrabold text-white" style="color:#FFFFFF !important;">{{ $expiredAlerts }}</h3>
                        <p class="mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Past alert validity</p>
                    </div>

                </div>
            </section>

            {{-- Create hazard alert form --}}
            <section class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 bg-gradient-to-r from-white via-white to-orange-50/60 px-6 py-5">
                    <h2 class="text-lg font-bold text-[#0F172A]">Create Hazard Alert</h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Provide the details of the hazard and its affected area.
                    </p>
                </div>

                <form action="{{ route('hazard-alerts.store') }}" method="POST" class="p-6 md:p-7">
                    @csrf

                    <div class="grid grid-cols-1 gap-x-6 gap-y-5 md:grid-cols-2">

                        <div>
                            <label for="title" class="mb-2 block text-xs font-semibold text-slate-700">Alert Title</label>
                            <input id="title" type="text" name="title" value="{{ old('title') }}" required
                                   placeholder="Enter alert title"
                                   class="h-[44px] w-full rounded-xl border border-slate-300 bg-slate-50 px-4 text-sm text-slate-800 placeholder:text-slate-400 transition focus:border-[#EA580C] focus:bg-white focus:outline-none focus:ring-4 focus:ring-orange-500/10">
                        </div>

                        <div>
                            <label for="hazard_type" class="mb-2 block text-xs font-semibold text-slate-700">Hazard Type</label>
                            <select id="hazard_type" name="hazard_type" required
                                    class="h-[44px] w-full rounded-xl border border-slate-300 bg-slate-50 px-4 text-sm text-slate-800 transition focus:border-[#EA580C] focus:bg-white focus:outline-none focus:ring-4 focus:ring-orange-500/10">
                                <option value="">Select hazard type</option>
                                @foreach (['Flood', 'Lahar', 'Volcanic Activity', 'Landslide', 'Typhoon', 'Earthquake', 'Other'] as $type)
                                    <option value="{{ $type }}" @selected(old('hazard_type') == $type)>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="severity" class="mb-2 block text-xs font-semibold text-slate-700">Severity Level</label>
                            <select id="severity" name="severity" required
                                    class="h-[44px] w-full rounded-xl border border-slate-300 bg-slate-50 px-4 text-sm text-slate-800 transition focus:border-[#EA580C] focus:bg-white focus:outline-none focus:ring-4 focus:ring-orange-500/10">
                                <option value="">Select severity</option>
                                @foreach (['Low', 'Moderate', 'High', 'Critical'] as $severity)
                                    <option value="{{ $severity }}" @selected(old('severity') == $severity)>{{ $severity }}</option>
                                @endforeach
                            </select>
                            <div class="mt-2 flex flex-wrap gap-1.5 text-[10px] font-medium">
                                <span class="rounded-full bg-red-50 px-2.5 py-1 text-red-700">● Critical</span>
                                <span class="rounded-full bg-orange-50 px-2.5 py-1 text-orange-700">● High</span>
                                <span class="rounded-full bg-amber-50 px-2.5 py-1 text-amber-700">● Moderate</span>
                                <span class="rounded-full bg-green-50 px-2.5 py-1 text-green-700">● Low</span>
                            </div>
                        </div>

                        <div>
                            <label for="affected_area" class="mb-2 block text-xs font-semibold text-slate-700">Affected Area</label>
                            <input id="affected_area" type="text" name="affected_area" value="{{ old('affected_area') }}" required
                                   placeholder="Example: Purok 1, Anoling"
                                   class="h-[44px] w-full rounded-xl border border-slate-300 bg-slate-50 px-4 text-sm text-slate-800 placeholder:text-slate-400 transition focus:border-[#EA580C] focus:bg-white focus:outline-none focus:ring-4 focus:ring-orange-500/10">
                        </div>

                        <div>
                            <label for="issued_at" class="mb-2 block text-xs font-semibold text-slate-700">Issued Date and Time</label>
                            <input id="issued_at" type="datetime-local" name="issued_at" value="{{ old('issued_at') }}" required
                                   class="h-[44px] w-full rounded-xl border border-slate-300 bg-slate-50 px-4 text-sm text-slate-800 placeholder:text-slate-400 transition focus:border-[#EA580C] focus:bg-white focus:outline-none focus:ring-4 focus:ring-orange-500/10">
                        </div>

                        <div>
                            <label for="expires_at" class="mb-2 block text-xs font-semibold text-slate-700">Expiration Date and Time</label>
                            <input id="expires_at" type="datetime-local" name="expires_at" value="{{ old('expires_at') }}"
                                   class="h-[44px] w-full rounded-xl border border-slate-300 bg-slate-50 px-4 text-sm text-slate-800 placeholder:text-slate-400 transition focus:border-[#EA580C] focus:bg-white focus:outline-none focus:ring-4 focus:ring-orange-500/10">
                            <p class="mt-1 text-[11px] text-slate-400">Optional.</p>
                        </div>

                        <div>
                            <label for="status" class="mb-2 block text-xs font-semibold text-slate-700">Alert Status</label>
                            <select id="status" name="status" required
                                    class="h-[44px] w-full rounded-xl border border-slate-300 bg-slate-50 px-4 text-sm text-slate-800 transition focus:border-[#EA580C] focus:bg-white focus:outline-none focus:ring-4 focus:ring-orange-500/10">
                                <option value="Active" @selected(old('status', 'Active') == 'Active')>Active</option>
                                <option value="Resolved" @selected(old('status') == 'Resolved')>Resolved</option>
                                <option value="Expired" @selected(old('status') == 'Expired')>Expired</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label for="description" class="mb-2 block text-xs font-semibold text-slate-700">Alert Description</label>
                            <textarea id="description" name="description" rows="2" required
                                      placeholder="Describe the hazard, possible impact, and necessary precautions..."
                                      class="w-full rounded-xl border border-slate-300 bg-slate-50 p-3 text-sm text-slate-800 placeholder:text-slate-400 transition focus:border-[#EA580C] focus:bg-white focus:outline-none focus:ring-4 focus:ring-orange-500/10">{{ old('description') }}</textarea>
                        </div>

                    </div>

                    <div class="mt-6 flex justify-end border-t border-slate-200 pt-5">
                        <button type="submit"
                                class="inline-flex items-center gap-2 rounded-xl bg-[#EA580C] px-6 py-3 text-sm font-bold text-white shadow-lg shadow-orange-600/20 transition hover:bg-[#C2410C] focus:outline-none focus:ring-4 focus:ring-orange-500/20 active:scale-[0.98]">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                                <path d="M12 5v14M5 12h14"/>
                            </svg>
                            Save Hazard Alert
                        </button>
                    </div>
                </form>
            </section>

            {{-- Hazard alert records --}}
            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 bg-gradient-to-r from-white via-white to-orange-50/60 px-6 py-5">
                    <h2 class="text-lg font-bold text-[#0F172A]">Hazard Alert Records</h2>
                    <p class="mt-1 text-xs text-slate-500">
                        View all recorded hazard alerts and their current status.
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[900px] text-left">
                        <thead class="bg-[#0F172A] text-xs uppercase tracking-wider text-white">
                            <tr>
                                <th class="px-5 py-4 font-semibold">Alert Details</th>
                                <th class="px-5 py-4 font-semibold">Hazard Type</th>
                                <th class="px-5 py-4 font-semibold">Severity</th>
                                <th class="px-5 py-4 font-semibold">Affected Area</th>
                                <th class="px-5 py-4 font-semibold">Issued At</th>
                                <th class="px-5 py-4 font-semibold">Status</th>
                                <th class="px-5 py-4 text-right font-semibold">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">
                            @forelse ($hazardAlerts as $alert)
                                <tr class="transition hover:bg-slate-50">
                                    <td class="px-5 py-4">
                                        <p class="text-sm font-semibold text-slate-800">{{ $alert->title }}</p>
                                        <p class="mt-1 max-w-xs truncate text-xs text-slate-500">
                                            {{ \Illuminate\Support\Str::limit($alert->description, 65) }}
                                        </p>
                                    </td>

                                    <td class="px-5 py-4 text-sm text-slate-600">{{ $alert->hazard_type }}</td>

                                    <td class="px-5 py-4">
                                        @if ($alert->severity === 'Critical')
                                            <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">Critical</span>
                                        @elseif ($alert->severity === 'High')
                                            <span class="inline-flex rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-700">High</span>
                                        @elseif ($alert->severity === 'Moderate')
                                            <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">Moderate</span>
                                        @else
                                            <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">Low</span>
                                        @endif
                                    </td>

                                    <td class="px-5 py-4 text-sm text-slate-600">{{ $alert->affected_area }}</td>

                                    <td class="whitespace-nowrap px-5 py-4 text-sm text-slate-600">
                                        {{ $alert->issued_at?->format('M d, Y h:i A') ?? '—' }}
                                    </td>

                                    <td class="px-5 py-4">
                                        @if ($alert->status === 'Active')
                                            <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">Active</span>
                                        @elseif ($alert->status === 'Resolved')
                                            <span class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">Resolved</span>
                                        @else
                                            <span class="inline-flex rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-700">Expired</span>
                                        @endif
                                    </td>

                                    <td class="px-5 py-4 text-right">
                                        <button
                                            type="button"
                                            onclick="openDeleteHazardModal(this)"
                                            data-action="{{ route('hazard-alerts.destroy', $alert->id) }}"
                                            data-alert-title="{{ $alert->title }}"
                                            class="inline-flex items-center rounded-lg border border-red-100 bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100 hover:text-red-700"
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-5 py-12 text-center">
                                        <p class="text-sm font-semibold text-slate-700">No hazard alerts recorded yet.</p>
                                        <p class="mt-1 text-xs text-slate-500">Create your first hazard alert using the form above.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="border-t border-slate-200 bg-slate-50 px-6 py-4">
                    <p class="text-xs text-slate-500">Showing {{ $totalAlerts }} hazard alert records</p>
                </div>
            </section>

            <p class="mt-3 text-[11px] leading-relaxed text-slate-400">
                Always verify hazard information and warning levels with authorized local disaster risk reduction and management personnel before issuing public advisories.
            </p>

        </section>
    </div>

    {{-- DELETE HAZARD ALERT CONFIRMATION MODAL --}}
    <div id="deleteHazardModal"
        class="modal-backdrop fixed inset-0 z-[120] hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm"
        aria-hidden="true">
        <div role="dialog" aria-modal="true"
            aria-labelledby="deleteHazardModalTitle"
            aria-describedby="deleteHazardModalDescription"
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

                <h2 id="deleteHazardModalTitle" class="text-lg font-extrabold text-[#0F172A]">
                    Confirm Delete
                </h2>

                <p id="deleteHazardModalDescription" class="mt-2 text-sm leading-relaxed text-slate-500">
                    Are you sure you want to delete this hazard alert? This action cannot be undone.
                </p>

                <p id="deleteHazardTitle"
                    class="mt-3 rounded-lg border border-slate-200 bg-slate-50 px-3 py-2 text-sm font-bold text-slate-700"></p>

                <div class="mt-6 flex flex-col-reverse justify-center gap-2 sm:flex-row">
                    <button type="button" id="cancelDeleteHazard"
                        class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-300">
                        Cancel
                    </button>

                    <form id="deleteHazardForm" method="POST" action="" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex w-full items-center justify-center rounded-xl bg-[#EA580C] px-5 py-2.5 text-sm font-bold text-white shadow-sm transition hover:bg-[#C2410C] focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 sm:w-auto">
                            Yes, Delete Alert
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- PAGE STYLES --}}
    <style>
        .modal-backdrop {
            background: rgba(15, 23, 42, .60);
        }

        /*
         * Blur the complete HERMIS background, including the sidebar and topbar,
         * while keeping the centered confirmation modal sharp.
         */
        body.hazard-delete-modal-open .hermis-sidebar,
        body.hazard-delete-modal-open .hermis-main-content > header,
        body.hazard-delete-modal-open #hazardAlertsPageContent {
            filter: blur(4px);
            transition: filter .18s ease;
            pointer-events: none;
            user-select: none;
        }

        #deleteHazardModal {
            position: fixed;
            inset: 0;
        }
    </style>

    {{-- DELETE MODAL JAVASCRIPT: SAME APPROACH AS EVACUATION CENTERS --}}
    <script>
        function openDeleteHazardModal(button) {
            const modal = document.getElementById('deleteHazardModal');
            const form = document.getElementById('deleteHazardForm');
            const title = document.getElementById('deleteHazardTitle');
            const cancelButton = document.getElementById('cancelDeleteHazard');

            if (!modal || !form || !title) return;

            form.action = button.dataset.action || '';
            title.textContent = button.dataset.alertTitle || 'Selected hazard alert';

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            modal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
            document.body.classList.add('hazard-delete-modal-open');

            if (cancelButton) cancelButton.focus();
        }

        function closeDeleteHazardModal() {
            const modal = document.getElementById('deleteHazardModal');
            if (!modal) return;

            modal.classList.add('hidden');
            modal.classList.remove('flex');
            modal.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('hazard-delete-modal-open');

            if (!document.querySelector('.modal-backdrop.flex')) {
                document.body.style.overflow = '';
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('deleteHazardModal');
            const cancelButton = document.getElementById('cancelDeleteHazard');

            if (cancelButton) {
                cancelButton.addEventListener('click', function () {
                    closeDeleteHazardModal();
                });
            }

            if (modal) {
                modal.addEventListener('click', function (event) {
                    if (event.target === modal) {
                        closeDeleteHazardModal();
                    }
                });
            }

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
                    closeDeleteHazardModal();
                }
            });
        });
    </script>

</x-app-layout>
