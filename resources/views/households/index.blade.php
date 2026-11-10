
<x-app-layout>

    <section class="mx-auto max-w-[1600px] space-y-7 px-1 pb-10">

        {{-- PAGE HEADING: MATCHES HERMIS DASHBOARD --}}
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
                        Management / Households
                    </p>
                    <h1 class="mt-1 text-3xl font-extrabold tracking-tight text-[#0F172A] sm:text-4xl">Household Records</h1>
                    <p class="mt-2 text-sm text-slate-500">Manage and monitor registered households in the community.</p>
                </div>
                <a href="{{ route('households.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-bold text-white shadow-lg shadow-orange-600/20 transition duration-200 hover:-translate-y-0.5 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-orange-200" style="background:#EA580C !important;color:#FFFFFF !important;" onmouseover="this.style.backgroundColor='#C2410C'" onmouseout="this.style.backgroundColor='#EA580C'">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14"/></svg>
                    Add Household
                </a>
            </div>
        </section>

        {{-- SUCCESS / ERROR MESSAGES --}}
        @if (session('login_success'))
            <div id="loginSuccessToast"
                 role="status"
                 class="fixed left-1/2 top-1/2 z-[100] flex w-max max-w-[calc(100%-32px)] -translate-x-1/2 -translate-y-1/2 items-center gap-3 rounded-xl border border-orange-200 bg-white px-5 py-4 text-sm font-semibold text-slate-800 shadow-2xl">
                <span class="flex h-7 w-7 flex-shrink-0 items-center justify-center rounded-full bg-orange-600 text-white">
                    ✓
                </span>
                {{ session('login_success') }}
            </div>
        @endif

        @if (session('success'))
            <div role="status"
                 class="flex items-start gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                <svg class="mt-0.5 h-5 w-5 flex-shrink-0" fill="none"
                     stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5 13l4 4L19 7"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div role="alert"
                 class="flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                <svg class="mt-0.5 h-5 w-5 flex-shrink-0" fill="none"
                     stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 9v4m0 4h.01M10.3 3.9L2.8 17a2 2 0 001.7 3h15a2 2 0 001.7-3L13.7 3.9a2 2 0 00-3.4 0z"/>
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        {{-- STATISTICS --}}
        <div>
            <div class="mb-5 border-l-4 border-[#EA580C] pl-4">
                <h2 class="text-lg font-bold text-[#0F172A]">Household Overview</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Summary of registered households and their risk classification.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">

                {{-- TOTAL HOUSEHOLDS --}}
                <div class="group relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A !important;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%) !important;color:#FFFFFF !important;">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">Total Households</p>
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 10.5L12 3l9 7.5V20a1 1 0 01-1 1h-6v-6H10v6H4a1 1 0 01-1-1v-9.5z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="mt-5 text-3xl font-extrabold tracking-tight text-white" style="color:#FFFFFF !important;">
                        {{ $totalHouseholds }}
                    </h3>
                    <p class="mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Registered households</p>
                </div>

                {{-- TOTAL MEMBERS --}}
                <div class="group relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A !important;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%) !important;color:#FFFFFF !important;">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">Total Family Members</p>
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-sky-500/20 text-sky-100 ring-4 ring-white/10">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m12-13a4 4 0 110 8m4 5v-2a4 4 0 00-3-3.87M10 11a4 4 0 100-8 4 4 0 000 8z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="mt-5 text-3xl font-extrabold tracking-tight text-white" style="color:#FFFFFF !important;">
                        {{ $totalMembers }}
                    </h3>
                    <p class="mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Individuals in households</p>
                </div>

                {{-- HIGH RISK --}}
                <div class="group relative min-h-[142px] overflow-hidden rounded-2xl border border-slate-700/70 bg-gradient-to-br from-[#0F172A] via-[#14243A] to-[#1E293B] p-5 text-white shadow-[0_5px_16px_rgba(15,23,42,0.16)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_12px_26px_rgba(15,23,42,0.22)] after:absolute after:bottom-0 after:right-0 after:h-1.5 after:w-1/3 after:skew-x-[-35deg] after:bg-[#EA580C]" style="background-color:#0F172A !important;background-image:linear-gradient(135deg,#0F172A 0%,#14243A 55%,#1E293B 100%) !important;color:#FFFFFF !important;">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-semibold text-slate-200" style="color:#E2E8F0 !important;">High-Risk Households</p>
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white ring-4 ring-white/10">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 9v4m0 4h.01M10.3 3.9L2.8 17a2 2 0 001.7 3h15a2 2 0 001.7-3L13.7 3.9a2 2 0 00-3.4 0z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="mt-5 text-3xl font-extrabold text-white" style="color:#FFFFFF !important;">
                        {{ $highRiskHouseholds }}
                    </h3>
                    <p class="mt-2 text-xs text-slate-300" style="color:#CBD5E1 !important;">Households requiring priority</p>
                </div>

            </div>
        </div>

        {{-- HOUSEHOLD DIRECTORY --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_5px_18px_rgba(15,23,42,0.07)]">

            {{-- DIRECTORY HEADER --}}
            <div class="flex flex-col gap-5 border-b border-slate-200 bg-gradient-to-r from-white via-white to-orange-50/70 p-5 sm:p-6 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h2 class="text-lg font-bold text-[#0F172A]">
                        Household Directory
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        View, search, and manage household information.
                    </p>
                </div>

                {{-- SEARCH AND FILTER --}}
                <div class="flex w-full flex-col gap-2 sm:flex-row lg:w-auto">

                    <div class="relative flex-1 lg:w-64">
                        <svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             stroke-width="2">
                            <circle cx="11" cy="11" r="7"/>
                            <path stroke-linecap="round" d="m16 16 4 4"/>
                        </svg>

                        <input type="search"
                               id="householdNameSearch"
                               placeholder="Search household name..."
                               aria-label="Search household name"
                               class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-10 pr-3 text-sm text-slate-700 placeholder-slate-400 outline-none transition focus:border-orange-500 focus:ring-4 focus:ring-orange-100">
                    </div>

                    <select id="householdRiskFilter"
                            aria-label="Filter by risk level"
                            class="rounded-xl border border-slate-300 bg-white px-3 py-3 text-sm text-slate-700 outline-none transition focus:border-orange-500 focus:ring-4 focus:ring-orange-100">
                        <option value="">All Risk Levels</option>
                        <option value="high">High</option>
                        <option value="moderate">Moderate</option>
                        <option value="low">Low</option>
                    </select>

                    <button type="button"
                            id="householdSearchButton"
                            style="background:#EA580C !important;color:#FFFFFF !important;"
                            class="rounded-xl px-5 py-3 text-sm font-bold text-white shadow-md shadow-orange-600/20 transition hover:bg-orange-700 focus:outline-none focus:ring-4 focus:ring-orange-200">
                        Search
                    </button>

                    <button type="button"
                            id="householdResetButton"
                            class="rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm font-bold text-slate-600 transition hover:border-slate-400 hover:bg-slate-100">
                        Reset
                    </button>

                </div>
            </div>

            {{-- TABLE --}}
            <div class="overflow-x-auto">
                <table class="w-full min-w-[850px] text-left">

                    <thead class="text-white" style="background:#0F172A;">
                        <tr class="text-[10px] font-extrabold uppercase tracking-[0.12em] text-slate-200">
                            <th class="px-6 py-4">Household Head</th>
                            <th class="px-6 py-4">Purok</th>
                            <th class="px-6 py-4">Members</th>
                            <th class="px-6 py-4">Risk Level</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse ($households as $household)
                            <tr class="household-filter-row transition duration-150 hover:bg-orange-50/70">

                                {{-- HOUSEHOLD HEAD --}}
                                <td class="px-6 py-4">
                                    <p class="text-sm font-semibold text-slate-800">
                                        {{ $household->household_head }}
                                    </p>
                                    <p class="mt-1 text-xs text-slate-400">
                                        {{ $household->contact_number ?? 'No contact number' }}
                                    </p>
                                </td>

                                {{-- PUROK --}}
                                <td class="px-6 py-4 text-sm text-slate-600">
                                    {{ $household->purok }}
                                </td>

                                {{-- MEMBERS --}}
                                <td class="px-6 py-4 text-sm font-semibold text-slate-800">
                                    {{ $household->members }}
                                </td>

                                {{-- RISK LEVEL --}}
                                <td class="px-6 py-4">
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

                                {{-- STATUS --}}
                                <td class="px-6 py-4">
                                    <span class="inline-flex rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700">
                                        {{ $household->status }}
                                    </span>
                                </td>

                                {{-- ACTIONS --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">

                                        <a href="{{ route('households.show', $household->id) }}"
                                           class="rounded-lg border border-blue-100 bg-blue-50 px-3.5 py-2 text-xs font-bold text-blue-700 transition hover:border-blue-200 hover:bg-blue-100">
                                            View
                                        </a>

                                        <a href="{{ route('households.edit', $household->id) }}"
                                           class="rounded-lg border border-orange-100 bg-orange-50 px-3.5 py-2 text-xs font-bold text-orange-700 transition hover:border-orange-200 hover:bg-orange-100">
                                            Edit
                                        </a>

                                        <form action="{{ route('households.destroy', $household->id) }}"
                                              method="POST"
                                              class="household-delete-form">
                                            @csrf
                                            @method('DELETE')

                                            <button type="button"
                                                    class="household-delete-button rounded-lg border border-red-100 bg-red-50 px-3.5 py-2 text-xs font-bold text-red-700 transition hover:border-red-200 hover:bg-red-100"
                                                    data-household-name="{{ $household->household_head }}">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center">
                                    <div class="mx-auto flex max-w-sm flex-col items-center">

                                        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-slate-100 text-slate-400">
                                            <svg class="h-8 w-8" fill="none" stroke="currentColor"
                                                 viewBox="0 0 24 24" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M3 10.5L12 3l9 7.5V20a1 1 0 01-1 1h-6v-6H10v6H4a1 1 0 01-1-1v-9.5z"/>
                                            </svg>
                                        </div>

                                        <h3 class="mt-4 text-sm font-bold text-slate-800">
                                            No household records yet
                                        </h3>

                                        <p class="mt-2 text-sm text-slate-500">
                                            Start by registering a household to populate your household directory.
                                        </p>

                                        <a href="{{ route('households.create') }}"
                                           class="mt-5 inline-flex items-center gap-2 rounded-xl px-5 py-3 text-sm font-bold text-white shadow-md shadow-orange-600/20 transition hover:bg-orange-700 focus:outline-none focus:ring-4 focus:ring-orange-200" style="background:#EA580C !important;color:#FFFFFF !important;">
                                            <span>+</span>
                                            Register First Household
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @endforelse

                        {{-- FILTER EMPTY STATE --}}
                        <tr id="householdFilterNoResults" style="display:none;">
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="text-sm font-semibold text-slate-700">
                                    No matching household records found.
                                </div>
                                <p class="mt-1 text-xs text-slate-400">
                                    Try changing your search or risk level filter.
                                </p>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            {{-- TABLE FOOTER --}}
            <div class="flex flex-col gap-2 border-t border-slate-200 bg-slate-50 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-xs text-slate-500">
                    Showing
                    <span id="visibleHouseholdCount" class="font-bold text-slate-700">
                        {{ $households->count() }}
                    </span>
                    of
                    <span class="font-bold text-slate-700">
                        {{ $households->count() }}
                    </span>
                    household records
                </p>

                <p class="text-xs text-slate-400">
                    HERMIS Household Management
                </p>
            </div>

        </div>

    </section>


    {{-- CENTERED DELETE CONFIRMATION MODAL - MATCHES HERMIS LOGOUT MODAL --}}
    <div id="deleteHouseholdConfirmModal"
         class="fixed inset-0 z-[100] hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm"
         aria-hidden="true">
        <div role="dialog"
             aria-modal="true"
             aria-labelledby="deleteHouseholdConfirmTitle"
             aria-describedby="deleteHouseholdConfirmDescription"
             class="w-full max-w-sm overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl">

            <div class="px-6 pb-5 pt-6 text-center">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-orange-50 text-[#EA580C]">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M4 7h16"/>
                        <path d="M10 11v6M14 11v6"/>
                        <path d="M5 7l1 14h12l1-14"/>
                        <path d="M9 7V4h6v3"/>
                    </svg>
                </div>

                <h2 id="deleteHouseholdConfirmTitle" class="text-lg font-extrabold text-[#0F172A]">
                    Confirm Delete
                </h2>

                <p id="deleteHouseholdConfirmDescription" class="mt-2 text-sm leading-relaxed text-slate-500">
                    Are you sure you want to delete this household? This action cannot be undone.
                </p>

                <div class="mt-6 flex flex-col-reverse justify-center gap-2 sm:flex-row">
                    <button type="button" id="cancelDeleteHouseholdConfirm"
                        class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-300">
                        Cancel
                    </button>

                    <button type="button" id="confirmDeleteHousehold"
                        class="inline-flex items-center justify-center rounded-xl bg-[#EA580C] px-5 py-2.5 text-sm font-bold text-white shadow-sm transition hover:bg-[#C2410C] focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                        Yes, Delete Household
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- PAGE SCRIPTS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // LOGIN SUCCESS TOAST
            const toast = document.getElementById('loginSuccessToast');

            if (toast) {
                setTimeout(function () {
                    toast.style.transition = 'opacity 0.3s ease';
                    toast.style.opacity = '0';

                    setTimeout(function () {
                        toast.remove();
                    }, 300);
                }, 1500);
            }

            // CENTERED HOUSEHOLD DELETE CONFIRMATION MODAL
            const deleteModal = document.getElementById('deleteHouseholdConfirmModal');
            const deleteDescription = document.getElementById('deleteHouseholdConfirmDescription');
            const cancelDeleteButton = document.getElementById('cancelDeleteHouseholdConfirm');
            const confirmDeleteButton = document.getElementById('confirmDeleteHousehold');
            let pendingDeleteForm = null;
            let previousDeleteBodyOverflow = '';
            let previouslyFocusedElement = null;

            function openDeleteModal(form, householdName) {
                if (!deleteModal || !deleteDescription || !confirmDeleteButton || !form) return;

                pendingDeleteForm = form;
                previouslyFocusedElement = document.activeElement;
                deleteDescription.textContent = householdName
                    ? 'Are you sure you want to delete the household of ' + householdName + '? This action cannot be undone.'
                    : 'Are you sure you want to delete this household? This action cannot be undone.';

                previousDeleteBodyOverflow = document.body.style.overflow;
                deleteModal.classList.remove('hidden');
                deleteModal.classList.add('flex');
                deleteModal.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
                cancelDeleteButton?.focus();
            }

            function closeDeleteModal() {
                if (!deleteModal) return;

                deleteModal.classList.add('hidden');
                deleteModal.classList.remove('flex');
                deleteModal.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = previousDeleteBodyOverflow;
                pendingDeleteForm = null;

                if (previouslyFocusedElement && typeof previouslyFocusedElement.focus === 'function') {
                    previouslyFocusedElement.focus();
                }
            }

            document.querySelectorAll('.household-delete-button').forEach(function (button) {
                button.addEventListener('click', function () {
                    const form = button.closest('.household-delete-form');
                    const householdName = button.getAttribute('data-household-name') || '';
                    openDeleteModal(form, householdName);
                });
            });

            if (cancelDeleteButton) {
                cancelDeleteButton.addEventListener('click', closeDeleteModal);
            }

            if (confirmDeleteButton) {
                confirmDeleteButton.addEventListener('click', function () {
                    if (!pendingDeleteForm) return;

                    confirmDeleteButton.disabled = true;
                    pendingDeleteForm.submit();
                });
            }

            if (deleteModal) {
                deleteModal.addEventListener('click', function (event) {
                    if (event.target === deleteModal) closeDeleteModal();
                });
            }

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && deleteModal && !deleteModal.classList.contains('hidden')) {
                    closeDeleteModal();
                }
            });

            // HOUSEHOLD SEARCH AND FILTER
            const nameInput = document.getElementById('householdNameSearch');
            const riskSelect = document.getElementById('householdRiskFilter');
            const searchButton = document.getElementById('householdSearchButton');
            const resetButton = document.getElementById('householdResetButton');

            const rows = Array.from(
                document.querySelectorAll('.household-filter-row')
            );

            const noResults = document.getElementById('householdFilterNoResults');
            const visibleCount = document.getElementById('visibleHouseholdCount');

            if (!nameInput || !riskSelect) return;

            function filterHouseholds() {
                const nameQuery = nameInput.value.trim().toLowerCase();
                const riskQuery = riskSelect.value.trim().toLowerCase();

                let count = 0;

                rows.forEach(function (row) {
                    const householdName =
                        row.querySelector('td:first-child')?.textContent.toLowerCase() || '';

                    const riskText =
                        row.querySelector('td:nth-child(4)')?.textContent.toLowerCase() || '';

                    const matchesName = householdName.includes(nameQuery);
                    const matchesRisk = !riskQuery || riskText.includes(riskQuery);

                    const matches = matchesName && matchesRisk;

                    row.style.display = matches ? '' : 'none';

                    if (matches) {
                        count++;
                    }
                });

                if (noResults) {
                    noResults.style.display =
                        rows.length > 0 && count === 0 ? '' : 'none';
                }

                if (visibleCount) {
                    visibleCount.textContent = count;
                }
            }

            nameInput.addEventListener('input', filterHouseholds);
            riskSelect.addEventListener('change', filterHouseholds);

            if (searchButton) {
                searchButton.addEventListener('click', filterHouseholds);
            }

            if (resetButton) {
                resetButton.addEventListener('click', function () {
                    nameInput.value = '';
                    riskSelect.value = '';
                    filterHouseholds();
                });
            }

        });
    </script>

</x-app-layout>
