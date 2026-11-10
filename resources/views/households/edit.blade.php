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

            <div class="relative flex flex-col justify-center">
                <p class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.18em] text-[#EA580C]">
                    <span class="h-2 w-2 rounded-full bg-[#EA580C] shadow-[0_0_0_4px_rgba(234,88,12,0.12)]"></span>
                    Management / Households / Edit Household
                </p>
                <h1 class="mt-1 text-3xl font-extrabold tracking-tight text-[#0F172A] sm:text-4xl">
                    Edit Household
                </h1>
                <p class="mt-2 text-sm text-slate-500">
                    Update the household information using the form below.
                </p>
            </div>
        </section>

        {{-- SECTION LABEL --}}
        <div class="border-l-4 border-[#EA580C] pl-4">
            <h2 class="text-base font-extrabold text-[#0F172A]">Household Information</h2>
            <p class="mt-1 text-sm text-slate-500">Review and update the registered household details.</p>
        </div>

        {{-- UPDATE FORM --}}
        <form action="{{ route('households.update', $household->id) }}"
              method="POST"
              class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_5px_18px_rgba(15,23,42,0.06)]">
            @csrf
            @method('PUT')

            {{-- FORM HEADER --}}
            <div class="flex items-center gap-3 border-b border-slate-200 bg-gradient-to-r from-white via-white to-orange-50/60 px-5 py-4 sm:px-6">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white shadow-md shadow-orange-600/20">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10.5 12 3l9 7.5V20a1 1 0 0 1-1 1h-6v-6h-4v6H4a1 1 0 0 1-1-1v-9.5Z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-extrabold text-[#0F172A]">Household Information</h3>
                    <p class="mt-0.5 text-sm text-slate-500">Update the basic details of this household.</p>
                </div>
            </div>

            {{-- FORM FIELDS --}}
            <div class="p-5 sm:p-6 lg:p-7">
                <div class="grid grid-cols-1 gap-x-6 gap-y-5 md:grid-cols-2">

                    {{-- HOUSEHOLD HEAD --}}
                    <div>
                        <label for="household_head" class="mb-2 block text-sm font-semibold text-slate-700">
                            Household Head Name <span class="text-[#EA580C]">*</span>
                        </label>
                        <input
                            id="household_head"
                            type="text"
                            name="household_head"
                            required
                            value="{{ old('household_head', $household->household_head) }}"
                            placeholder="Enter full name"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-[#EA580C] focus:ring-4 focus:ring-orange-100"
                            aria-invalid="{{ $errors->has('household_head') ? 'true' : 'false' }}"
                        >
                        @error('household_head')
                            <p class="mt-1.5 text-xs font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- CONTACT NUMBER --}}
                    <div>
                        <label for="contact_number" class="mb-2 block text-sm font-semibold text-slate-700">
                            Contact Number
                        </label>
                        <input
                            id="contact_number"
                            type="text"
                            name="contact_number"
                            value="{{ old('contact_number', $household->contact_number) }}"
                            placeholder="09XXXXXXXXX"
                            inputmode="tel"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-[#EA580C] focus:ring-4 focus:ring-orange-100"
                            aria-invalid="{{ $errors->has('contact_number') ? 'true' : 'false' }}"
                        >
                        @error('contact_number')
                            <p class="mt-1.5 text-xs font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- PUROK --}}
                    <div>
                        <label for="purok" class="mb-2 block text-sm font-semibold text-slate-700">
                            Purok <span class="text-[#EA580C]">*</span>
                        </label>
                        <select
                            id="purok"
                            name="purok"
                            required
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm outline-none transition focus:border-[#EA580C] focus:ring-4 focus:ring-orange-100"
                            aria-invalid="{{ $errors->has('purok') ? 'true' : 'false' }}"
                        >
                            <option value="">Select Purok</option>
                            @foreach (['Purok 1','Purok 2','Purok 3','Purok 4','Purok 5','Purok 6','Purok 7'] as $purok)
                                <option value="{{ $purok }}" {{ old('purok', $household->purok) == $purok ? 'selected' : '' }}>
                                    {{ $purok }}
                                </option>
                            @endforeach
                        </select>
                        @error('purok')
                            <p class="mt-1.5 text-xs font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- BARANGAY --}}
                    <div>
                        <label for="barangay" class="mb-2 block text-sm font-semibold text-slate-700">
                            Barangay <span class="text-[#EA580C]">*</span>
                        </label>
                        <input
                            id="barangay"
                            type="text"
                            name="barangay"
                            required
                            value="{{ old('barangay', $household->barangay) }}"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm outline-none transition focus:border-[#EA580C] focus:ring-4 focus:ring-orange-100"
                            aria-invalid="{{ $errors->has('barangay') ? 'true' : 'false' }}"
                        >
                        @error('barangay')
                            <p class="mt-1.5 text-xs font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- MEMBERS --}}
                    <div>
                        <label for="members" class="mb-2 block text-sm font-semibold text-slate-700">
                            Number of Family Members <span class="text-[#EA580C]">*</span>
                        </label>
                        <input
                            id="members"
                            type="number"
                            name="members"
                            required
                            min="1"
                            value="{{ old('members', $household->members) }}"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm outline-none transition focus:border-[#EA580C] focus:ring-4 focus:ring-orange-100"
                            aria-invalid="{{ $errors->has('members') ? 'true' : 'false' }}"
                        >
                        @error('members')
                            <p class="mt-1.5 text-xs font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- RISK LEVEL --}}
                    <div>
                        <label for="risk_level" class="mb-2 block text-sm font-semibold text-slate-700">
                            Risk Level <span class="text-[#EA580C]">*</span>
                        </label>
                        <select
                            id="risk_level"
                            name="risk_level"
                            required
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm outline-none transition focus:border-[#EA580C] focus:ring-4 focus:ring-orange-100"
                            aria-invalid="{{ $errors->has('risk_level') ? 'true' : 'false' }}"
                        >
                            <option value="">Select Risk Level</option>
                            <option value="Low" {{ old('risk_level', $household->risk_level) == 'Low' ? 'selected' : '' }}>Low</option>
                            <option value="Moderate" {{ old('risk_level', $household->risk_level) == 'Moderate' ? 'selected' : '' }}>Moderate</option>
                            <option value="High" {{ old('risk_level', $household->risk_level) == 'High' ? 'selected' : '' }}>High</option>
                        </select>
                        @error('risk_level')
                            <p class="mt-1.5 text-xs font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <p class="mt-6 text-xs text-slate-500">
                    <span class="font-bold text-[#EA580C]">*</span>
                    Required fields must be completed before saving.
                </p>
            </div>

            {{-- FORM FOOTER --}}
            <div class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50/80 px-5 py-4 sm:flex-row sm:items-center sm:justify-end sm:px-6">
                <a href="{{ route('households.index') }}"
                   class="inline-flex min-h-11 items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-bold text-slate-700 shadow-sm transition hover:border-slate-400 hover:bg-slate-100 focus:outline-none focus:ring-4 focus:ring-slate-200">
                    Cancel
                </a>

                <button
                    type="submit"
                    class="inline-flex min-h-11 items-center justify-center gap-2 rounded-xl px-6 py-2.5 text-sm font-bold text-white shadow-lg shadow-orange-600/20 transition hover:-translate-y-0.5 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-orange-200"
                    style="background:#EA580C !important;color:#FFFFFF !important;"
                    onmouseover="this.style.backgroundColor='#C2410C'"
                    onmouseout="this.style.backgroundColor='#EA580C'"
                >
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6"/>
                    </svg>
                    Save Changes
                </button>
            </div>
        </form>

    </section>

</x-app-layout>
