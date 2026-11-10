<x-guest-layout>
    <style>
        .hermis-login-page {
            min-height: 100vh;
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            background: #F1F5F9;
            color: #0F172A;
            font-family: Arial, Helvetica, sans-serif;
        }

        .hermis-login-brand {
            position: relative;
            min-width: 0;
            min-height: 100vh;
            overflow: hidden;
            color: #FFFFFF;
            background-color: #0F172A;
            background-image:
                linear-gradient(115deg, rgba(8, 20, 43, .94), rgba(15, 35, 65, .82)),
                url('{{ asset('images/hermis-background.png') }}');
            background-size: cover;
            background-position: center;
        }

        .hermis-login-brand::before,
        .hermis-login-brand::after {
            content: "";
            position: absolute;
            pointer-events: none;
            border-radius: 999px;
        }

        .hermis-login-brand::before {
            width: 420px;
            height: 420px;
            right: -220px;
            top: 8%;
            border: 1px solid rgba(255,255,255,.10);
            box-shadow: 0 0 0 34px rgba(255,255,255,.025), 0 0 0 68px rgba(255,255,255,.02);
        }

        .hermis-login-brand::after {
            width: 520px;
            height: 260px;
            right: -180px;
            bottom: -165px;
            border-radius: 60% 0 0 0;
            background: linear-gradient(135deg, rgba(234,88,12,.96), rgba(194,65,12,.78));
            transform: rotate(-12deg);
        }

        .hermis-brand-inner {
            position: relative;
            z-index: 1;
            box-sizing: border-box;
            width: min(100%, 760px);
            min-height: 100vh;
            margin: 0 auto;
            padding: 34px clamp(28px, 4vw, 64px) 26px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .hermis-brand-mark {
            display: inline-flex;
            align-items: center;
            gap: 13px;
        }

        .hermis-brand-icon {
            display: flex;
            width: 48px;
            height: 48px;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: #EA580C;
            color: #FFFFFF;
            box-shadow: 0 8px 18px rgba(234,88,12,.24);
        }

        .hermis-brand-name {
            margin: 0;
            color: #FFFFFF;
            font-size: 29px;
            line-height: 1;
            font-weight: 800;
            letter-spacing: .4px;
        }

        .hermis-brand-name span { color: #FB923C; }

        .hermis-brand-caption {
            margin: 5px 0 0;
            color: #CBD5E1;
            font-size: 11px;
            letter-spacing: .7px;
        }

        .hermis-brand-content {
            width: 100%;
            max-width: 610px;
            margin: 32px 0;
        }

        .hermis-brand-kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin: 0 0 14px;
            color: #FDBA74;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .hermis-brand-kicker::before {
            content: "";
            display: inline-block;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #EA580C;
            box-shadow: 0 0 0 4px rgba(234,88,12,.17);
        }

        .hermis-brand-title {
            max-width: 560px;
            margin: 0;
            color: #FFFFFF;
            font-size: clamp(31px, 3.4vw, 48px);
            line-height: 1.12;
            font-weight: 800;
            letter-spacing: -1.2px;
        }

        .hermis-brand-title span { color: #FB923C; }

        .hermis-brand-description {
            max-width: 520px;
            margin: 16px 0 0;
            color: #CBD5E1;
            font-size: 14px;
            line-height: 1.7;
        }

        .hermis-feature-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
            margin-top: 28px;
        }

        .hermis-feature {
            display: flex;
            min-width: 0;
            align-items: center;
            gap: 11px;
            padding: 12px;
            border: 1px solid rgba(255,255,255,.11);
            border-radius: 13px;
            background: rgba(255,255,255,.065);
            backdrop-filter: blur(5px);
        }

        .hermis-feature-icon {
            display: flex;
            width: 38px;
            height: 38px;
            flex: 0 0 38px;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            background: rgba(234,88,12,.18);
            color: #FDBA74;
        }

        .hermis-feature-title {
            margin: 0;
            color: #FFFFFF;
            font-size: 12px;
            line-height: 1.3;
            font-weight: 700;
        }

        .hermis-feature-text {
            margin: 4px 0 0;
            color: #CBD5E1;
            font-size: 10px;
            line-height: 1.4;
        }

        .hermis-brand-footer {
            position: relative;
            z-index: 2;
            padding-top: 15px;
            border-top: 1px solid rgba(255,255,255,.20);
        }

        .hermis-brand-footer p {
            margin: 0;
            color: #E2E8F0;
            font-size: 11px;
        }

        .hermis-brand-footer p + p {
            margin-top: 5px;
            color: #94A3B8;
            font-size: 10px;
        }

        .hermis-login-panel {
            position: relative;
            display: flex;
            min-width: 0;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-sizing: border-box;
            padding: 30px clamp(18px, 2vw, 34px);
            background:
                radial-gradient(circle at 100% 0%, rgba(234,88,12,.08), transparent 30%),
                linear-gradient(145deg, #F8FAFC 0%, #EEF3F9 100%);
        }

        .hermis-login-panel::before,
        .hermis-login-panel::after {
            content: "";
            position: absolute;
            pointer-events: none;
            background: rgba(203,213,225,.22);
            transform: rotate(45deg);
        }

        .hermis-login-panel::before {
            width: 260px;
            height: 260px;
            top: -155px;
            right: -80px;
        }

        .hermis-login-panel::after {
            width: 190px;
            height: 190px;
            bottom: -120px;
            left: -100px;
            background: rgba(234,88,12,.045);
        }

        .hermis-login-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 700px;
            box-sizing: border-box;
            padding: clamp(32px, 3vw, 44px);
            border: 1px solid rgba(234,88,12,.16);
            border-radius: 22px;
            background: #FFFFFF;
            box-shadow: 0 22px 55px rgba(15,23,42,.16), 0 0 38px rgba(234,88,12,.20), 0 10px 28px rgba(234,88,12,.10);
        }

        .hermis-login-logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 25px;
            text-align: center;
        }

        .hermis-login-logo-icon {
            display: flex;
            width: 48px;
            height: 48px;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
            border-radius: 14px;
            background: #EA580C;
            color: #FFFFFF;
            box-shadow: 0 8px 18px rgba(234,88,12,.24);
        }

        .hermis-login-logo h1 {
            margin: 0;
            color: #0F172A;
            font-size: 29px;
            line-height: 1.1;
            font-weight: 800;
            letter-spacing: .3px;
        }

        .hermis-login-logo h1 span { color: #EA580C; }

        .hermis-login-logo p {
            margin: 5px 0 0;
            color: #64748B;
            font-size: 11px;
        }

        .hermis-login-heading { margin-bottom: 27px; }

        .hermis-login-heading h2 {
            margin: 0;
            color: #0F172A;
            font-size: 29px;
            line-height: 1.2;
            font-weight: 800;
            letter-spacing: -.4px;
        }

        .hermis-login-heading p {
            margin: 8px 0 0;
            color: #64748B;
            font-size: 14px;
            line-height: 1.65;
        }

        .hermis-login-field { margin-top: 21px; }

        .hermis-login-label {
            display: block;
            margin-bottom: 7px;
            color: #334155;
            font-size: 13px;
            font-weight: 700;
        }

        .hermis-login-input-wrap { position: relative; }

        .hermis-login-input-icon {
            position: absolute;
            top: 50%;
            left: 13px;
            display: flex;
            color: #94A3B8;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .hermis-login-input {
            display: block;
            width: 100%;
            height: 54px;
            box-sizing: border-box;
            padding: 0 48px 0 44px;
            border: 1px solid #CBD5E1;
            border-radius: 11px;
            outline: none;
            background: #F8FAFC;
            color: #0F172A;
            font-family: inherit;
            font-size: 14px;
            transition: border-color .18s ease, box-shadow .18s ease, background .18s ease;
        }


        .hermis-masked-password {
            -webkit-text-security: disc;
            text-security: disc;
        }

        .hermis-masked-password.hermis-password-visible {
            -webkit-text-security: none;
            text-security: none;
        }

        .hermis-login-input::placeholder { color: #94A3B8; }

        .hermis-login-input:focus {
            border-color: #EA580C;
            background: #FFFFFF;
            box-shadow: 0 0 0 3px rgba(234,88,12,.12);
        }

        .hermis-password-toggle {
            position: absolute;
            top: 50%;
            right: 11px;
            display: flex;
            width: 30px;
            height: 30px;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 8px;
            background: transparent;
            color: #64748B;
            cursor: pointer;
            transform: translateY(-50%);
        }

        .hermis-password-toggle:hover {
            background: #F1F5F9;
            color: #0F172A;
        }

        .hermis-login-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 20px;
        }

        .hermis-remember-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #475569;
            font-size: 12px;
        }

        .hermis-remember-label input {
            width: 15px;
            height: 15px;
            accent-color: #EA580C;
        }

        .hermis-forgot-link {
            color: #EA580C;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
        }

        .hermis-forgot-link:hover {
            color: #C2410C;
            text-decoration: underline;
        }

        .hermis-signin-button {
            display: flex;
            width: 100%;
            min-height: 54px;
            align-items: center;
            justify-content: center;
            gap: 9px;
            margin-top: 27px;
            padding: 12px 18px;
            border: 0;
            border-radius: 11px;
            background: #EA580C;
            color: #FFFFFF;
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 7px 15px rgba(234,88,12,.18);
            transition: background .18s ease, transform .18s ease, box-shadow .18s ease;
        }

        .hermis-signin-button:hover {
            background: #C2410C;
            box-shadow: 0 9px 18px rgba(194,65,12,.22);
            transform: translateY(-1px);
        }

        .hermis-signin-button:focus {
            outline: 3px solid rgba(234,88,12,.22);
            outline-offset: 2px;
        }

        .hermis-security-notice {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 25px;
            padding: 15px 16px;
            border: 1px solid #E2E8F0;
            border-radius: 11px;
            background: #F8FAFC;
        }

        .hermis-security-notice-icon {
            display: flex;
            flex: 0 0 29px;
            width: 29px;
            height: 29px;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            background: #FFF7ED;
            color: #EA580C;
        }

        .hermis-security-notice strong {
            display: block;
            color: #1E293B;
            font-size: 11px;
        }

        .hermis-security-notice p {
            margin: 4px 0 0;
            color: #64748B;
            font-size: 10px;
            line-height: 1.5;
        }

        .hermis-login-copyright {
            margin: 20px 0 0;
            color: #94A3B8;
            font-size: 11px;
            text-align: center;
        }

        @media (max-width: 900px) {
            .hermis-brand-inner { padding-left: 25px; padding-right: 25px; }
            .hermis-brand-title { font-size: 34px; }
            .hermis-feature-grid { grid-template-columns: 1fr; gap: 9px; }
            .hermis-feature { padding: 9px 10px; }
            .hermis-login-panel { padding: 24px; }
        }

        @media (max-width: 700px) {
            .hermis-login-page { grid-template-columns: 1fr; }
            .hermis-login-brand { min-height: auto; }
            .hermis-brand-inner {
                min-height: auto;
                padding: 25px 24px 22px;
            }
            .hermis-brand-content { margin: 28px 0 24px; }
            .hermis-brand-title { font-size: 31px; }
            .hermis-brand-description { font-size: 12px; margin-top: 10px; }
            .hermis-feature-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); margin-top: 19px; }
            .hermis-feature { gap: 8px; padding: 9px; }
            .hermis-feature-icon { width: 32px; height: 32px; flex-basis: 32px; }
            .hermis-feature-title { font-size: 10px; }
            .hermis-feature-text { font-size: 9px; }
            .hermis-brand-footer { margin-top: 8px; }
            .hermis-login-panel { min-height: auto; padding: 28px 18px 34px; }
            .hermis-login-card { max-width: 700px; }
        }

        @media (max-width: 420px) {
            .hermis-feature-grid { grid-template-columns: 1fr; }
            .hermis-login-card { padding: 25px 21px; }
            .hermis-login-options { align-items: flex-start; }
        }

        @media (max-height: 780px) and (min-width: 701px) {
            .hermis-brand-inner { padding-top: 23px; padding-bottom: 18px; }
            .hermis-brand-content { margin: 17px 0; }
            .hermis-brand-title { font-size: 34px; }
            .hermis-brand-description { margin-top: 10px; font-size: 12px; }
            .hermis-feature-grid { gap: 8px; margin-top: 17px; }
            .hermis-feature { padding: 8px 10px; }
            .hermis-feature-icon { width: 33px; height: 33px; flex-basis: 33px; }
            .hermis-login-card { padding-top: 25px; padding-bottom: 25px; }
            .hermis-login-logo { margin-bottom: 17px; }
            .hermis-login-heading { margin-bottom: 15px; }
            .hermis-login-field { margin-top: 13px; }
            .hermis-security-notice { margin-top: 16px; }
        }
    </style>

    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
    <div class="hermis-login-page">
        {{-- LEFT BRAND PANEL --}}
        <section class="hermis-login-brand" aria-label="HERMIS system introduction">
            <div class="hermis-brand-inner">
                <div class="hermis-brand-mark">
                    <div class="hermis-brand-icon" aria-hidden="true">
                        <svg width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 3 4.5 6.2v5.1c0 4.4 3 7.9 7.5 9.7 4.5-1.8 7.5-5.3 7.5-9.7V6.2L12 3Z"/>
                            <path d="m9 12 2 2 4-4"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="hermis-brand-name">HERMIS<span>.</span></h1>
                        <p class="hermis-brand-caption">Evacuation Management System</p>
                    </div>
                </div>

                <div class="hermis-brand-content">
                    <p class="hermis-brand-kicker">Barangay Anoling · Camalig, Albay</p>
                    <h2 class="hermis-brand-title">
                        Sa Mas Ligtas at<br>
                        Mas Handang <span>Komunidad.</span>
                    </h2>
                    <p class="hermis-brand-description">
                        A community-based evacuation management system for safer,
                        more resilient, and better-prepared communities.
                    </p>

                    <div class="hermis-feature-grid">
                        <div class="hermis-feature">
                            <div class="hermis-feature-icon" aria-hidden="true">
                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="9" cy="8" r="3"/>
                                    <path d="M3 20v-1.5a6 6 0 0 1 12 0V20M16 5.5a3 3 0 0 1 0 5.8M18 15a5 5 0 0 1 3 4.5"/>
                                </svg>
                            </div>
                            <div>
                                <p class="hermis-feature-title">Household Management</p>
                                <p class="hermis-feature-text">Organize and monitor community households</p>
                            </div>
                        </div>

                        <div class="hermis-feature">
                            <div class="hermis-feature-icon" aria-hidden="true">
                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 19V5m0 14h17"/>
                                    <path d="M8 16v-4m4 4V8m4 8v-6m4 6V4"/>
                                </svg>
                            </div>
                            <div>
                                <p class="hermis-feature-title">Risk Monitoring</p>
                                <p class="hermis-feature-text">Track and manage potential hazards</p>
                            </div>
                        </div>

                        <div class="hermis-feature">
                            <div class="hermis-feature-icon" aria-hidden="true">
                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/>
                                    <circle cx="12" cy="10" r="2.5"/>
                                </svg>
                            </div>
                            <div>
                                <p class="hermis-feature-title">Evacuation Centers</p>
                                <p class="hermis-feature-text">Manage evacuation facilities and resources</p>
                            </div>
                        </div>

                        <div class="hermis-feature">
                            <div class="hermis-feature-icon" aria-hidden="true">
                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M7 3h7l5 5v13H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z"/>
                                    <path d="M14 3v6h5M9 14h6M9 18h6"/>
                                </svg>
                            </div>
                            <div>
                                <p class="hermis-feature-title">Reports and Analytics</p>
                                <p class="hermis-feature-text">Generate reports for better decision-making</p>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="hermis-brand-footer">
                    <p>Barangay Anoling, Camalig, Albay</p>
                    <p>HERMIS | Household Evacuation and Risk Management Information System</p>
                </footer>
            </div>
        </section>

        {{-- RIGHT LOGIN PANEL --}}
        <section class="hermis-login-panel" aria-label="Sign in form">
            <div class="hermis-login-card">
                <div class="hermis-login-logo">
                    <div class="hermis-login-logo-icon" aria-hidden="true">
                        <svg width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M12 3 4.5 6.2v5.1c0 4.4 3 7.9 7.5 9.7 4.5-1.8 7.5-5.3 7.5-9.7V6.2L12 3Z"/>
                            <path d="m9 12 2 2 4-4"/>
                        </svg>
                    </div>
                    <h1>HERMIS<span>.</span></h1>
                    <p>Evacuation Management System</p>
                </div>

                <div class="hermis-login-heading">
                    <h2>Welcome Back!</h2>
                    <p>Sign in to your account to continue managing community evacuation records.</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                @if ($errors->any())
                    <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
                        <p class="font-semibold">Unable to sign in.</p>
                        <p class="mt-1">Please check your email address and password, then try again.</p>
                    </div>
                @endif

                <form id="hermisLoginForm" method="POST" action="{{ route('login') }}" autocomplete="off">
                    @csrf

                    {{-- Actual Laravel fields are populated only when the form is submitted. --}}
                    <input type="hidden" name="email" id="loginEmailPayload" value="">
                    <input type="hidden" name="password" id="loginPasswordPayload" value="">

                    <div class="hermis-login-field">
                        <label for="hermisIdentityEntry" class="hermis-login-label">Email Address</label>
                        <div class="hermis-login-input-wrap">
                            <span class="hermis-login-input-icon" aria-hidden="true">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="5" width="18" height="14" rx="2"/>
                                    <path d="m3 7 9 6 9-6"/>
                                </svg>
                            </span>
                            <input
                                id="hermisIdentityEntry"
                                class="hermis-login-input"
                                type="text"
                                name="hermis_identity_entry"
                                value=""
                                required
                                autocomplete="off"
                                inputmode="email"
                                autocapitalize="none"
                                spellcheck="false"
                                data-lpignore="true"
                                data-1p-ignore="true"
                                aria-label="Email Address"
                                placeholder="Enter your email address"
                            >
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="hermis-login-field">
                        <label for="hermisPasswordEntry" class="hermis-login-label">Password</label>
                        <div class="hermis-login-input-wrap">
                            <span class="hermis-login-input-icon" aria-hidden="true">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="4" y="10" width="16" height="11" rx="2"/>
                                    <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                                </svg>
                            </span>
                            <input
                                id="hermisPasswordEntry"
                                class="hermis-login-input hermis-masked-password"
                                type="text"
                                name="hermis_password_entry"
                                value=""
                                required
                                autocomplete="off"
                                data-lpignore="true"
                                data-1p-ignore="true"
                                autocapitalize="none"
                                spellcheck="false"
                                aria-label="Password"
                                placeholder="Enter your password"
                            >
                            <button
                                class="hermis-password-toggle"
                                type="button"
                                id="togglePassword"
                                aria-label="Show password"
                                title="Show password"
                            >
                                <svg id="passwordEyeIcon" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12Z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="hermis-login-options">
                        <label for="remember_me" class="hermis-remember-label">
                            <input id="remember_me" type="checkbox" name="remember">
                            <span>Remember me</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="hermis-forgot-link">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="hermis-signin-button">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M10 17l5-5-5-5"/>
                            <path d="M15 12H3"/>
                            <path d="M12 3h5a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-5"/>
                        </svg>
                        Sign In
                    </button>
                </form>

                <div class="hermis-security-notice">
                    <div class="hermis-security-notice-icon" aria-hidden="true">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 3 4.5 6.2v5.1c0 4.4 3 7.9 7.5 9.7 4.5-1.8 7.5-5.3 7.5-9.7V6.2L12 3Z"/>
                            <path d="m9 12 2 2 4-4"/>
                        </svg>
                    </div>
                    <div>
                        <strong>Authorized personnel only.</strong>
                        <p>This system is for official use in evacuation management and community safety.</p>
                    </div>
                </div>

                <p class="hermis-login-copyright">
                    HERMIS · Barangay Anoling, Camalig, Albay
                </p>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('hermisPasswordEntry');
            const emailInput = document.getElementById('hermisIdentityEntry');
            const toggleButton = document.getElementById('togglePassword');
            const eyeIcon = document.getElementById('passwordEyeIcon');
            const loginForm = document.getElementById('hermisLoginForm');
            const emailPayload = document.getElementById('loginEmailPayload');
            const passwordPayload = document.getElementById('loginPasswordPayload');
            const rememberInput = document.getElementById('remember_me');

            if (toggleButton && passwordInput && eyeIcon) {
                toggleButton.addEventListener('click', function () {
                    const showing = passwordInput.classList.toggle('hermis-password-visible');
                    toggleButton.setAttribute('aria-label', showing ? 'Hide password' : 'Show password');
                    toggleButton.setAttribute('title', showing ? 'Hide password' : 'Show password');

                    eyeIcon.innerHTML = showing
                        ? '<path d="M3 3l18 18"/><path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"/><path d="M9.9 5.2A10.8 10.8 0 0 1 12 5c6.4 0 10 7 10 7a17 17 0 0 1-3.1 3.8M6.2 6.2C3.5 8 2 12 2 12s3.6 7 10 7c1.4 0 2.7-.3 3.8-.8"/>'
                        : '<path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12Z"/><circle cx="12" cy="12" r="3"/>';
                });
            }

            function clearVisibleLoginFields() {
                if (emailInput) emailInput.value = '';
                if (passwordInput) passwordInput.value = '';
                if (emailPayload) emailPayload.value = '';
                if (passwordPayload) passwordPayload.value = '';
                if (rememberInput) rememberInput.checked = false;
            }

            // Clear any values restored by browser back/forward cache on page return.
            clearVisibleLoginFields();
            window.addEventListener('pageshow', clearVisibleLoginFields);

            if (loginForm) {
                let submittingWithFreshToken = false;

                loginForm.addEventListener('submit', async function (event) {
                    if (submittingWithFreshToken) return;

                    event.preventDefault();

                    const emailValue = emailInput ? emailInput.value.trim() : '';
                    const passwordValue = passwordInput ? passwordInput.value : '';

                    if (!emailValue || !passwordValue) {
                        if (!emailValue && emailInput) emailInput.focus();
                        else if (passwordInput) passwordInput.focus();
                        return;
                    }

                    if (emailPayload) emailPayload.value = emailValue;
                    if (passwordPayload) passwordPayload.value = passwordValue;

                    const tokenField = loginForm.querySelector('input[name="_token"]');
                    const submitButton = loginForm.querySelector('button[type="submit"]');
                    const originalButtonText = submitButton ? submitButton.innerHTML : '';

                    try {
                        if (submitButton) {
                            submitButton.disabled = true;
                            submitButton.style.opacity = '0.75';
                            submitButton.style.cursor = 'wait';
                            submitButton.innerHTML = 'Signing in...';
                        }

                        // Request a fresh login page so the CSRF token and session cookie
                        // are current, especially after logout or a long idle period.
                        const freshUrl = new URL(window.location.href);
                        freshUrl.searchParams.set('_csrf_refresh', Date.now().toString());

                        const response = await fetch(freshUrl.toString(), {
                            method: 'GET',
                            credentials: 'same-origin',
                            cache: 'no-store',
                            headers: {
                                'Accept': 'text/html',
                                'Cache-Control': 'no-cache',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        });

                        if (!response.ok) {
                            throw new Error('Unable to refresh the login session.');
                        }

                        const html = await response.text();
                        const parsedPage = new DOMParser().parseFromString(html, 'text/html');
                        const freshToken = parsedPage.querySelector('form[action*="login"] input[name="_token"]')
                            || parsedPage.querySelector('input[name="_token"]');

                        if (!freshToken || !freshToken.value) {
                            throw new Error('The login security token could not be refreshed.');
                        }

                        if (tokenField) {
                            tokenField.value = freshToken.value;
                        } else {
                            throw new Error('The CSRF token field is missing from the login form.');
                        }

                        submittingWithFreshToken = true;
                        loginForm.submit();
                    } catch (error) {
                        if (submitButton) {
                            submitButton.disabled = false;
                            submitButton.style.opacity = '';
                            submitButton.style.cursor = '';
                            submitButton.innerHTML = originalButtonText;
                        }

                        alert('Unable to refresh your login session. Please reload the page and try again.');
                        console.error('HERMIS login session refresh:', error);
                    }
                });
            }
        });
    </script>
</x-guest-layout>
