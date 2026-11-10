<x-app-layout>
    <style>
        /* Scoped form layout to keep the field rhythm consistent across screens. */
        .hermis-add-household-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            column-gap: 24px;
            row-gap: 22px;
        }

        .hermis-add-household-field {
            min-width: 0;
        }

        .hermis-add-household-field label {
            display: block;
            margin: 0 0 8px;
            color: #334155;
            font-size: 13px;
            font-weight: 700;
            line-height: 1.4;
        }

        .hermis-add-household-field input,
        .hermis-add-household-field select {
            display: block;
            width: 100%;
            min-width: 0;
            min-height: 44px;
            box-sizing: border-box;
            border: 1px solid #CBD5E1;
            border-radius: 12px;
            background-color: #F8FAFC;
            padding: 10px 14px;
            color: #0F172A;
            font-size: 13px;
            line-height: 1.4;
            outline: none;
            transition: border-color .18s ease, box-shadow .18s ease, background-color .18s ease;
        }

        .hermis-add-household-field input::placeholder {
            color: #94A3B8;
            opacity: 1;
        }

        .hermis-add-household-field input:focus,
        .hermis-add-household-field select:focus {
            border-color: #EA580C;
            background-color: #FFFFFF;
            box-shadow: 0 0 0 4px rgba(234, 88, 12, .11);
        }

        .hermis-add-household-field input[aria-invalid="true"],
        .hermis-add-household-field select[aria-invalid="true"] {
            border-color: #DC2626;
            background-color: #FFF7F7;
        }

        @media (max-width: 767px) {
            .hermis-add-household-grid {
                grid-template-columns: minmax(0, 1fr);
                row-gap: 18px;
            }
        }
    </style>

    <div class="mx-auto max-w-[1600px] space-y-7 px-1 pb-10">

        {{-- PAGE HEADING: SAME HERO STYLE AS THE HERMIS DASHBOARD --}}
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
                        Management / Households / Add Household
                    </p>
                    <h1 class="mt-1 text-3xl font-extrabold tracking-tight text-[#0F172A] sm:text-4xl">
                        Add Household
                    </h1>
                    <p class="mt-2 text-sm text-slate-500">
                        Register a household and record its basic information and risk classification.
                    </p>
                </div>

                <a href="{{ route('households.index') }}"
                   class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl border border-transparent px-4 py-2.5 text-sm font-bold text-white shadow-md shadow-orange-600/20 transition hover:-translate-y-0.5 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-orange-200 active:translate-y-0"
                   style="background-color:#EA580C !important;color:#FFFFFF !important;"
                   onmouseover="this.style.backgroundColor='#C2410C'"
                   onmouseout="this.style.backgroundColor='#EA580C'">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Back to Households
                </a>
            </div>
        </section>

        {{-- VALIDATION SUMMARY --}}
        @if ($errors->any())
            <div role="alert" class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-800 shadow-sm">
                <p class="font-bold">Please review the required information.</p>
                <ul class="mt-2 list-inside list-disc space-y-1 text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- SECTION HEADING: SAME ORANGE ACCENT AS DASHBOARD SECTIONS --}}
        <section class="pt-1">
            <div class="mb-5 border-l-4 border-[#EA580C] pl-4">
                <h2 class="text-lg font-bold text-[#0F172A]">Household Registration</h2>
                <p class="mt-1 text-sm text-slate-500">Complete the required information below.</p>
            </div>

            {{-- FORM CARD: SAME WHITE CARD LANGUAGE AS THE HOUSEHOLD DIRECTORY --}}
            <form action="{{ route('households.store') }}" method="POST"
                  class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_5px_18px_rgba(15,23,42,0.07)]">
                @csrf

                {{-- FORM CARD HEADER --}}
                <div class="flex flex-col gap-3 border-b border-slate-200 bg-gradient-to-r from-white via-white to-orange-50/70 px-5 py-5 sm:flex-row sm:items-center sm:px-6">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-orange-50 text-[#EA580C] ring-1 ring-orange-100">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10.5L12 3l9 7.5V20a1 1 0 01-1 1h-6v-6h-4v6H4a1 1 0 01-1-1v-9.5z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-[#0F172A]">Household Information</h3>
                        <p class="mt-1 text-sm text-slate-500">Basic details of the household and its classification.</p>
                    </div>
                </div>

                {{-- FORM FIELDS --}}
                <div class="p-5 sm:p-6 lg:p-7">
                    <div class="hermis-add-household-grid">

                        {{-- HOUSEHOLD HEAD --}}
                        <div class="hermis-add-household-field">
                            <label for="household_head">Household Head Name <span class="text-[#EA580C]">*</span></label>
                            <input id="household_head" type="text" name="household_head" required
                                   value="{{ old('household_head') }}"
                                   placeholder="Enter full name"
                                   autocomplete="name"
                                   aria-invalid="{{ $errors->has('household_head') ? 'true' : 'false' }}">
                            @error('household_head')
                                <p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- CONTACT NUMBER --}}
                        <div class="hermis-add-household-field">
                            <label for="contact_number">Contact Number</label>
                            <input id="contact_number" type="text" name="contact_number"
                                   value="{{ old('contact_number') }}"
                                   placeholder="09XXXXXXXXX"
                                   inputmode="tel"
                                   aria-invalid="{{ $errors->has('contact_number') ? 'true' : 'false' }}">
                            @error('contact_number')
                                <p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- PUROK --}}
                        <div class="hermis-add-household-field">
                            <label for="purok">Purok <span class="text-[#EA580C]">*</span></label>
                            <select id="purok" name="purok" required
                                    aria-invalid="{{ $errors->has('purok') ? 'true' : 'false' }}">
                                <option value="">Select Purok</option>
                                @foreach (['Purok 1','Purok 2','Purok 3','Purok 4','Purok 5','Purok 6','Purok 7'] as $purok)
                                    <option value="{{ $purok }}" {{ old('purok') == $purok ? 'selected' : '' }}>
                                        {{ $purok }}
                                    </option>
                                @endforeach
                            </select>
                            @error('purok')
                                <p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- BARANGAY --}}
                        <div class="hermis-add-household-field">
                            <label for="barangay">Barangay <span class="text-[#EA580C]">*</span></label>
                            <input id="barangay" type="text" name="barangay" required
                                   value="{{ old('barangay', 'Anoling') }}"
                                   aria-invalid="{{ $errors->has('barangay') ? 'true' : 'false' }}">
                            @error('barangay')
                                <p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- FAMILY MEMBERS --}}
                        <div class="hermis-add-household-field">
                            <label for="members">Number of Family Members <span class="text-[#EA580C]">*</span></label>
                            <input id="members" type="number" name="members" required min="1"
                                   value="{{ old('members', 1) }}"
                                   aria-invalid="{{ $errors->has('members') ? 'true' : 'false' }}">
                            @error('members')
                                <p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- RISK LEVEL --}}
                        <div class="hermis-add-household-field">
                            <label for="risk_level">Risk Level <span class="text-[#EA580C]">*</span></label>
                            <select id="risk_level" name="risk_level" required
                                    aria-invalid="{{ $errors->has('risk_level') ? 'true' : 'false' }}">
                                <option value="">Select Risk Level</option>
                                <option value="Low" {{ old('risk_level') == 'Low' ? 'selected' : '' }}>Low</option>
                                <option value="Moderate" {{ old('risk_level') == 'Moderate' ? 'selected' : '' }}>Moderate</option>
                                <option value="High" {{ old('risk_level') == 'High' ? 'selected' : '' }}>High</option>
                            </select>
                            @error('risk_level')
                                <p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- HOUSEHOLD STATUS --}}
                        <div class="hermis-add-household-field">
                            <label for="status">Household Status <span class="text-[#EA580C]">*</span></label>
                            <select id="status" name="status" required
                                    aria-invalid="{{ $errors->has('status') ? 'true' : 'false' }}">
                                <option value="Active" {{ old('status', 'Active') == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <p class="mt-6 text-xs text-slate-500">
                        <span class="font-bold text-[#EA580C]">*</span>
                        Required fields must be completed before saving.
                    </p>
                </div>

                {{-- FORM ACTIONS --}}
                <div class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50/80 px-5 py-4 sm:flex-row sm:items-center sm:justify-end sm:px-6">
                    <a href="{{ route('households.index') }}"
                       class="inline-flex min-h-11 items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-bold text-slate-700 shadow-sm transition hover:border-slate-400 hover:bg-slate-100 focus:outline-none focus:ring-4 focus:ring-slate-200">
                        Cancel
                    </a>

                    <button type="submit"
                            class="inline-flex min-h-11 items-center justify-center gap-2 rounded-xl px-6 py-2.5 text-sm font-bold text-white shadow-md shadow-orange-600/20 transition hover:-translate-y-0.5 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-orange-200 active:translate-y-0"
                            style="background-color:#EA580C !important;color:#FFFFFF !important;"
                            onmouseover="this.style.backgroundColor='#C2410C'"
                            onmouseout="this.style.backgroundColor='#EA580C'">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        Save Household
                    </button>
                </div>
            </form>
        </section>

    </div>
</x-app-layout>
