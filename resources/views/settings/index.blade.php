<x-app-layout>

    @php
        $user = auth()->user();
    @endphp

    <section class="mx-auto max-w-[1600px] space-y-6 px-1 pb-10">

        {{-- PAGE HEADER: MATCHES HOUSEHOLD DETAILS VIEW --}}
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
                        Account Management / Settings
                    </p>
                    <h1 class="mt-1 text-3xl font-extrabold tracking-tight text-[#0F172A] sm:text-4xl">
                        Account Settings
                    </h1>
                    <p class="mt-2 text-sm text-slate-500">
                        Manage your administrator account information and security preferences.
                    </p>
                </div>
            </div>
        </section>

        {{-- ACCOUNT OVERVIEW --}}
        <div class="flex items-center gap-3">
            <div class="h-8 w-1 rounded-full bg-[#EA580C]"></div>
            <div>
                <h2 class="text-base font-extrabold text-[#0F172A]">Account Overview</h2>
                <p class="mt-0.5 text-xs text-slate-500">Manage administrator details and maintain the security of your HERMIS account.</p>
            </div>
        </div>

        {{-- ADMINISTRATOR PROFILE --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_5px_18px_rgba(15,23,42,0.06)]">

            {{-- PROFILE CARD HEADER --}}
            <div class="flex flex-col gap-4 border-b border-slate-200 bg-gradient-to-r from-white via-white to-orange-50/60 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                <div class="flex min-w-0 items-center gap-3">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#EA580C] text-white shadow-md shadow-orange-600/20">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2M12 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-[11px] font-bold uppercase tracking-[0.16em] text-[#EA580C]">
                            Administrator Profile
                        </p>
                        <h2 class="mt-0.5 truncate text-xl font-extrabold text-[#0F172A]">
                            {{ $user->name }}
                        </h2>
                        <p class="mt-0.5 text-sm text-slate-500">HERMIS Administrator</p>
                    </div>
                </div>

                <span class="inline-flex w-fit items-center gap-1.5 rounded-full border border-green-100 bg-green-50 px-3 py-1.5 text-xs font-bold text-green-700">
                    <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                    Active Account
                </span>
            </div>

            {{-- PROFILE FORM --}}
            <div class="p-5 sm:p-6">
                <div class="mb-5 flex items-center gap-3">
                    <div class="h-7 w-1 rounded-full bg-[#EA580C]"></div>
                    <div>
                        <h3 class="text-base font-extrabold text-[#0F172A]">Personal Information</h3>
                        <p class="mt-0.5 text-xs text-slate-500">Update your administrator name and email address.</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('settings.profile.update') }}">
                    @csrf
                    @method('PATCH')

                    @if (session('profile_status'))
                        <div class="mb-5 flex items-start gap-2 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700" role="status">
                            <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5 13 4 4L19 7"/>
                            </svg>
                            <span>{{ session('profile_status') }}</span>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                        <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                            <label for="name" class="mb-2 block text-[11px] font-bold uppercase tracking-wide text-slate-500">
                                Full Name <span class="text-[#EA580C]">*</span>
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name', $user->name) }}"
                                required
                                maxlength="255"
                                autocomplete="name"
                                placeholder="Enter your full name"
                                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm font-semibold text-[#0F172A] outline-none transition placeholder:font-normal placeholder:text-slate-400 focus:border-[#EA580C] focus:ring-2 focus:ring-orange-100 @error('name') border-red-400 @enderror">
                            @error('name')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                            <label for="email" class="mb-2 block text-[11px] font-bold uppercase tracking-wide text-slate-500">
                                Email Address <span class="text-[#EA580C]">*</span>
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email', $user->email) }}"
                                required
                                maxlength="255"
                                autocomplete="email"
                                placeholder="Enter your email address"
                                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm font-semibold text-[#0F172A] outline-none transition placeholder:font-normal placeholder:text-slate-400 focus:border-[#EA580C] focus:ring-2 focus:ring-orange-100 @error('email') border-red-400 @enderror">
                            @error('email')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-5 flex justify-end border-t border-slate-200 pt-4">
                        <button type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-bold text-white shadow-lg shadow-orange-600/20 transition duration-200 hover:-translate-y-0.5 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-orange-200"
                            style="background:#EA580C !important;color:#FFFFFF !important;"
                            onmouseover="this.style.backgroundColor='#C2410C'"
                            onmouseout="this.style.backgroundColor='#EA580C'">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5 13 4 4L19 7"/>
                            </svg>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </section>

        {{-- ACCOUNT SECURITY / CHANGE PASSWORD --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_5px_18px_rgba(15,23,42,0.06)]">

            {{-- SECURITY CARD HEADER: MATCHES HOUSEHOLD RISK ASSESSMENT HEADER --}}
            <div class="flex items-center gap-3 border-b border-slate-200 bg-gradient-to-r from-white via-white to-orange-50/60 px-5 py-4 sm:px-6">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-orange-50 text-[#EA580C] ring-1 ring-orange-100">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                        <rect x="4" y="10" width="16" height="11" rx="2"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10V7a4 4 0 0 1 8 0v3m-4 5v2"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-extrabold text-[#0F172A]">Change Password</h3>
                    <p class="mt-0.5 text-sm text-slate-500">Update your password to keep your administrator account secure.</p>
                </div>
            </div>

            {{-- PASSWORD FORM --}}
            <div class="p-5 sm:p-6">
                <div class="mb-5 flex items-center gap-3">
                    <div class="h-7 w-1 rounded-full bg-[#EA580C]"></div>
                    <div>
                        <h3 class="text-base font-extrabold text-[#0F172A]">Password Information</h3>
                        <p class="mt-0.5 text-xs text-slate-500">Enter your current password and choose a new password.</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('settings.password.update') }}">
                    @csrf
                    @method('PUT')

                    @if (session('password_status'))
                        <div class="mb-5 flex items-start gap-2 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700" role="status">
                            <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5 13 4 4L19 7"/>
                            </svg>
                            <span>{{ session('password_status') }}</span>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-3">
                        <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                            <label for="current_password" class="mb-2 block text-[11px] font-bold uppercase tracking-wide text-slate-500">
                                Current Password <span class="text-[#EA580C]">*</span>
                            </label>
                            <input
                                type="password"
                                id="current_password"
                                name="current_password"
                                required
                                autocomplete="current-password"
                                placeholder="Enter current password"
                                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-[#0F172A] outline-none transition placeholder:text-slate-400 focus:border-[#EA580C] focus:ring-2 focus:ring-orange-100 @error('current_password') border-red-400 @enderror">
                            @error('current_password')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                            <label for="password" class="mb-2 block text-[11px] font-bold uppercase tracking-wide text-slate-500">
                                New Password <span class="text-[#EA580C]">*</span>
                            </label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                required
                                minlength="8"
                                autocomplete="new-password"
                                placeholder="Enter new password"
                                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-[#0F172A] outline-none transition placeholder:text-slate-400 focus:border-[#EA580C] focus:ring-2 focus:ring-orange-100 @error('password') border-red-400 @enderror">
                            @error('password')
                                <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-2 text-[11px] text-slate-400">Use at least 8 characters.</p>
                        </div>

                        <div class="rounded-xl border border-slate-200 bg-slate-50/80 p-4">
                            <label for="password_confirmation" class="mb-2 block text-[11px] font-bold uppercase tracking-wide text-slate-500">
                                Confirm New Password <span class="text-[#EA580C]">*</span>
                            </label>
                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                required
                                minlength="8"
                                autocomplete="new-password"
                                placeholder="Confirm new password"
                                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-[#0F172A] outline-none transition placeholder:text-slate-400 focus:border-[#EA580C] focus:ring-2 focus:ring-orange-100">
                        </div>
                    </div>

                    <div class="mt-4 flex items-start gap-3 rounded-xl border border-orange-100 bg-orange-50/70 p-4">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-white text-[#EA580C] ring-1 ring-orange-100">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3 3.8 7v5.2c0 4.6 3.2 7.8 8.2 9.8 5-2 8.2-5.2 8.2-9.8V7L12 3Z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-extrabold text-[#0F172A]">Account Security</p>
                            <p class="mt-1 text-xs leading-relaxed text-slate-600">
                                Your current password is required before you can change your account password. Keep your new password confidential.
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 flex justify-end border-t border-slate-200 pt-4">
                        <button type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-bold text-white shadow-lg shadow-orange-600/20 transition duration-200 hover:-translate-y-0.5 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-orange-200"
                            style="background:#EA580C !important;color:#FFFFFF !important;"
                            onmouseover="this.style.backgroundColor='#C2410C'"
                            onmouseout="this.style.backgroundColor='#EA580C'">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5 13 4 4L19 7"/>
                            </svg>
                            Update Password
                        </button>
                    </div>
                </form>
            </div>
        </section>

    </section>

</x-app-layout>
