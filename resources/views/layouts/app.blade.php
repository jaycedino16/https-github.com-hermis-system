

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HERMIS') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        :root {

            --sidebar-width: 250px;

            --navy: #0F172A;

            --navy-light: #1E293B;

            --orange: #EA580C;

            --orange-hover: #C2410C;

        }

        * { box-sizing: border-box; }

        html, body {

            min-height: 100%;

            margin: 0;

        }

        body {

            font-family: 'Figtree', sans-serif;

            background: #F1F5F9;

            color: #1E293B;

        }

        /* SIDEBAR */

        .hermis-sidebar {

            position: fixed;

            inset: 12px auto 12px 12px;

            width: var(--sidebar-width);

            display: flex;

            flex-direction: column;

            background: var(--navy);

            border: 1px solid rgba(255,255,255,.06);

            border-radius: 16px;

            overflow: hidden;

            z-index: 50;

            box-shadow: 0 8px 24px rgba(15,23,42,.12);

        }

        /* BRANDING */

        .hermis-brand {

            flex-shrink: 0;

            text-align: center;

            padding: 20px 15px 17px;

            border-bottom: 1px solid rgba(255,255,255,.10);

        }

        .hermis-brand-logo {

            width: 46px;

            height: 46px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin: 0 auto 9px;

            border-radius: 13px;

            color: white;

            background: var(--orange);

            box-shadow: 0 5px 14px rgba(234,88,12,.22);

        }

        .hermis-brand-logo svg {

            width: 25px;

            height: 25px;

        }

        .hermis-brand h1 {

            margin: 0;

            color: white;

            font-size: 22px;

            line-height: 1.2;

            font-weight: 800;

            letter-spacing: 1.5px;

        }

        .hermis-brand-name {

            max-width: 205px;

            margin: 7px auto 0;

            color: #CBD5E1;

            font-size: 9px;

            line-height: 1.55;

            font-weight: 600;

            letter-spacing: .65px;

        }

        .hermis-brand-location {

            margin-top: 9px;

            color: #94A3B8;

            font-size: 10px;

            font-weight: 500;

        }

        /* NAVIGATION */

        .hermis-sidebar-nav {

            flex: 1;

            min-height: 0;

            overflow-y: auto;

            padding: 15px 11px 10px;

            scrollbar-width: thin;

            scrollbar-color: #334155 transparent;

        }

        .hermis-sidebar-nav::-webkit-scrollbar { width: 4px; }

        .hermis-sidebar-nav::-webkit-scrollbar-thumb {

            background: #334155;

            border-radius: 10px;

        }

        .hermis-menu-heading {

            padding: 0 11px;

            margin: 5px 0 9px;

            color: #64748B;

            font-size: 9px;

            font-weight: 800;

            letter-spacing: 1.5px;

            text-transform: uppercase;

        }

        .hermis-menu-link {

            display: flex;

            align-items: center;

            gap: 11px;

            min-height: 40px;

            padding: 9px 11px;

            margin-bottom: 3px;

            border-radius: 8px;

            color: #CBD5E1;

            font-size: 12px;

            font-weight: 600;

            line-height: 1.35;

            text-decoration: none;

            transition: background .2s ease, color .2s ease;

        }

        .hermis-menu-link:hover {

            background: rgba(255,255,255,.08);

            color: white;

        }

        .hermis-menu-link.active {

            color: white;

            background: var(--orange);

            box-shadow: 0 4px 10px rgba(234,88,12,.18);

        }

        .hermis-menu-link.active:hover {

            background: var(--orange-hover);

        }

        .hermis-menu-link svg {

            width: 18px;

            height: 18px;

            flex-shrink: 0;

            stroke-width: 1.8;

        }

        .hermis-menu-divider {

            height: 1px;

            background: rgba(255,255,255,.10);

            margin: 15px 5px;

        }

        /* SYSTEM INFORMATION */

        .hermis-system-info {

            flex-shrink: 0;

            margin: 0 12px 10px;

            padding: 12px;

            border: 1px solid rgba(255,255,255,.08);

            border-radius: 10px;

            background: rgba(255,255,255,.045);

        }

        .hermis-system-info-title {

            display: flex;

            align-items: center;

            gap: 7px;

            margin-bottom: 9px;

            color: #E2E8F0;

            font-size: 10px;

            font-weight: 700;

        }

        .hermis-system-info-title svg {

            width: 15px;

            height: 15px;

            color: #FB923C;

        }

        .hermis-info-row {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 8px;

            margin-top: 6px;

            color: #94A3B8;

            font-size: 9px;

        }

        .hermis-info-value {

            color: #CBD5E1;

            font-weight: 600;

            text-align: right;

        }

        .hermis-status-dot {

            display: inline-block;

            width: 6px;

            height: 6px;

            margin-right: 4px;

            border-radius: 50%;

            background: #22C55E;

        }

        /* SIDEBAR FOOTER */

        .hermis-sidebar-footer {

            flex-shrink: 0;

            padding: 11px 12px 12px;

            border-top: 1px solid rgba(255,255,255,.10);

            background: rgba(2,6,23,.12);

        }

        .hermis-user-card {

            display: flex;

            align-items: center;

            gap: 9px;

            padding: 8px;

            margin-bottom: 5px;

            border-radius: 9px;

            background: rgba(255,255,255,.06);

        }

        .hermis-avatar {

            width: 34px;

            height: 34px;

            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

            border-radius: 50%;

            color: white;

            background: var(--orange);

            font-size: 13px;

            font-weight: 800;

        }

        .hermis-logout {

            display: flex;

            align-items: center;

            gap: 10px;

            width: 100%;

            padding: 9px 10px;

            border: 0;

            border-radius: 8px;

            background: var(--orange);

            color: #FFFFFF;

            font-family: inherit;

            font-size: 11px;

            font-weight: 600;

            text-align: left;

            cursor: pointer;

            box-shadow: 0 4px 10px rgba(234,88,12,.18);

            transition: .2s ease;

        }

        .hermis-logout:hover {

            color: #FFFFFF;

            background: var(--orange-hover);

        }

        .hermis-logout svg {

            width: 17px;

            height: 17px;

        }

        /* MAIN CONTENT */

        .hermis-main-content {

            width: calc(100% - var(--sidebar-width) - 24px);

            min-height: 100vh;

            min-width: 0;

            margin-left: calc(var(--sidebar-width) + 24px);

        }

        .hermis-page-content {

            width: 100%;

            min-width: 0;

            max-width: 100%;

            overflow-x: auto;

        }

        /* MOBILE */

        @media (max-width: 1023px) {

            .hermis-sidebar {

                inset: 0 auto 0 0;

                width: min(270px, 85vw);

                border-radius: 0 16px 16px 0;

                transform: translateX(-100%);

                transition: transform .3s ease;

            }

            .hermis-sidebar.mobile-open {

                transform: translateX(0);

            }

            .hermis-main-content {

                width: 100%;

                margin-left: 0;

            }

        }

    </style>

</head>

<body class="antialiased">

@auth

<div x-data="{ sidebarOpen: false }" class="min-h-screen">

    {{-- MOBILE OVERLAY --}}

    <div

        x-show="sidebarOpen"

        x-transition.opacity

        @click="sidebarOpen = false"

        class="fixed inset-0 z-40 bg-slate-950/60 lg:hidden"

        style="display:none;">

    </div>

    {{-- SIDEBAR --}}

    <aside

        :class="sidebarOpen ? 'mobile-open' : ''"

        class="hermis-sidebar text-white">

        {{-- BRANDING --}}

        <div class="hermis-brand">

            <div class="hermis-brand-logo">

                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round"

                        stroke-width="1.8"

                        d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z"/>

                    <path stroke-linecap="round" stroke-linejoin="round"

                        stroke-width="1.8"

                        d="M9 12l2 2 4-4"/>

                </svg>

            </div>

            <h1>HERMIS</h1>

            <p class="hermis-brand-name">

                HOUSEHOLD EVACUATION AND RISK MANAGEMENT INFORMATION SYSTEM

            </p>

            <p class="hermis-brand-location">

                BARANGAY ANOLING, CAMALIG, ALBAY

            </p>

            <button

                type="button"

                @click="sidebarOpen = false"

                class="absolute right-3 top-3 rounded-lg p-2 text-slate-400 hover:bg-white/10 lg:hidden"

                aria-label="Close sidebar">

                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round"

                        stroke-width="2" d="M6 6l12 12M18 6L6 18"/>

                </svg>

            </button>

        </div>

        {{-- NAVIGATION --}}

        <nav class="hermis-sidebar-nav">

            <p class="hermis-menu-heading">Main Menu</p>

            {{-- DASHBOARD --}}

            <a href="{{ route('dashboard') }}"

                @click="sidebarOpen = false"

                class="hermis-menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">

                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <rect x="3" y="3" width="7" height="7" rx="1"/>

                    <rect x="14" y="3" width="7" height="7" rx="1"/>

                    <rect x="14" y="14" width="7" height="7" rx="1"/>

                    <rect x="3" y="14" width="7" height="7" rx="1"/>

                </svg>

                Dashboard

            </a>

            {{-- HOUSEHOLDS --}}

            <a href="{{ route('households.index') }}"

                @click="sidebarOpen = false"

                class="hermis-menu-link {{ request()->routeIs('households.*') ? 'active' : '' }}">

                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round"

                        d="M3 10.5L12 3l9 7.5V20a1 1 0 01-1 1h-6v-6H10v6H4a1 1 0 01-1-1v-9.5z"/>

                </svg>

                Households

            </a>

            {{-- EVACUATION MONITORING --}}

            <a href="{{ route('evacuation-monitoring.index') }}"

                @click="sidebarOpen = false"

                class="hermis-menu-link {{ request()->routeIs('evacuation-monitoring.*') ? 'active' : '' }}">

                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <rect x="5" y="4" width="14" height="17" rx="2"/>

                    <path stroke-linecap="round" stroke-linejoin="round"

                        d="M9 4.5V3h6v1.5M9 10h6M9 14h6M9 18h3"/>

                </svg>

                Evacuation Monitoring

            </a>

            {{-- EVACUATION CENTERS --}}

            <a href="{{ route('evacuation-centers.index') }}"

                @click="sidebarOpen = false"

                class="hermis-menu-link {{ request()->routeIs('evacuation-centers.*') ? 'active' : '' }}">

                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round"

                        d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6M9 9h.01M15 9h.01"/>

                </svg>

                Evacuation Centers

            </a>

            {{-- RISK MONITORING --}}

            <a href="{{ route('risk-monitoring.index') }}"

                @click="sidebarOpen = false"

                class="hermis-menu-link {{ request()->routeIs('risk-monitoring.*') ? 'active' : '' }}">

                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round"

                        d="M3 12h4l3-8 4 16 3-8h4"/>

                </svg>

                Risk Monitoring

            </a>

            {{-- HAZARD ALERTS --}}

            <a href="{{ route('hazard-alerts.index') }}"

                @click="sidebarOpen = false"

                class="hermis-menu-link {{ request()->routeIs('hazard-alerts.*') ? 'active' : '' }}">

                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round"

                        d="M12 9v4m0 4h.01M10.3 3.9L2.8 17a2 2 0 001.7 3h15a2 2 0 001.7-3L13.7 3.9a2 2 0 00-3.4 0z"/>

                </svg>

                Hazard Alerts

            </a>

            {{-- REPORTS --}}

            <a href="{{ url('/reports') }}"

                @click="sidebarOpen = false"

                class="hermis-menu-link {{ request()->is('reports*') ? 'active' : '' }}">

                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round"

                        d="M4 19V5a2 2 0 012-2h12a2 2 0 012 2v14M8 16v-4M12 16V8m4 8v-6"/>

                </svg>

                Reports

            </a>

            <div class="hermis-menu-divider"></div>

            <p class="hermis-menu-heading">Others</p>

            {{-- SETTINGS --}}

            <a href="{{ route('settings.index') }}"

                @click="sidebarOpen = false"

                class="hermis-menu-link {{ request()->routeIs('settings.*') ? 'active' : '' }}">

                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <circle cx="12" cy="12" r="3"/>

                    <path stroke-linecap="round" stroke-linejoin="round"

                        d="M19.4 15a1.7 1.7 0 00.3 1.9l.1.1-1.5 2.6-.1-.1a1.7 1.7 0 00-1.8.7l-.1.1h-3l-.1-.1a1.7 1.7 0 00-1.8-.7l-.1.1-1.5-2.6.1-.1a1.7 1.7 0 00.3-1.9l-.1-.1v-3l.1-.1a1.7 1.7 0 00-.3-1.9l-.1-.1 1.5-2.6.1.1a1.7 1.7 0 001.8-.7l.1-.1h3l.1.1a1.7 1.7 0 001.8.7l.1-.1 1.5 2.6-.1.1a1.7 1.7 0 00.3 1.9l.1.1v3l-.1.1z"/>

                </svg>

                Settings

            </a>

            {{-- ABOUT --}}

            <a href="{{ route('about.index') }}"

                @click="sidebarOpen = false"

                class="hermis-menu-link {{ request()->routeIs('about.*') ? 'active' : '' }}">

                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <circle cx="12" cy="12" r="9"/>

                    <path stroke-linecap="round" stroke-linejoin="round"

                        d="M12 11v5m0-8h.01"/>

                </svg>

                About

            </a>

        </nav>

        {{-- SYSTEM INFORMATION --}}

        <section class="hermis-system-info">

            <div class="hermis-system-info-title">

                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <rect x="3" y="4" width="18" height="14" rx="2"/>

                    <path stroke-linecap="round" stroke-linejoin="round"

                        d="M8 22h8m-4-4v4"/>

                </svg>

                System Information

            </div>

            <div class="hermis-info-row">

                <span>System Status</span>

                <span class="hermis-info-value">

                    <span class="hermis-status-dot"></span>Operational

                </span>

            </div>

            <div class="hermis-info-row">

                <span>System</span>

                <span class="hermis-info-value">HERMIS</span>

            </div>

            <div class="hermis-info-row">

                <span>Version</span>

                <span class="hermis-info-value">1.0.0</span>

            </div>

        </section>

        {{-- SIDEBAR FOOTER --}}

        <div class="hermis-sidebar-footer">

            <div class="hermis-user-card">

                <div class="hermis-avatar">

                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                </div>

                <div class="min-w-0 flex-1">

                    <p class="truncate text-xs font-bold text-white">

                        {{ Auth::user()->name }}

                    </p>

                    <p class="text-[10px] text-slate-400">Administrator</p>

                </div>

                <span class="hermis-status-dot" title="Online"></span>

            </div>

            <button type="button" id="openLogoutConfirm" class="hermis-logout">

                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round"

                            d="M10 17l5-5-5-5m5 5H3m9-9h6a2 2 0 012 2v14a2 2 0 01-2 2h-6"/>

                    </svg>

                    Sign Out

                </button>

        </div>

    </aside>

    {{-- MAIN CONTENT --}}

    <div class="hermis-main-content">

        {{-- TOPBAR --}}

        <header class="sticky top-0 z-30 flex h-[68px] items-center justify-between border-b border-slate-200 bg-white px-4 shadow-sm sm:px-6 lg:px-7">

            <div class="flex items-center gap-3">

                <button

                    type="button"

                    @click="sidebarOpen = true"

                    class="rounded-lg p-2 text-slate-600 hover:bg-slate-100 lg:hidden"

                    aria-label="Open sidebar">

                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round"

                            stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>

                    </svg>

                </button>

                <div>

                    <p class="text-[11px] text-slate-400">

                        HERMIS / Management System

                    </p>

                    <h2 class="text-base font-bold text-[#0F172A]">

                        {{ request()->routeIs('dashboard') ? 'Dashboard' : (request()->routeIs('settings.*') ? 'Settings' : (request()->routeIs('about.*') ? 'About' : 'Management Portal')) }}

                    </h2>

                </div>

            </div>

            <div class="flex items-center gap-3">

                <div class="hidden text-right sm:block">

                    <p class="text-sm font-bold text-slate-800">

                        {{ Auth::user()->name }}

                    </p>

                    <p class="text-[11px] text-slate-500">

                        Administrator

                    </p>

                </div>

                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-orange-100 text-sm font-bold text-[#EA580C]">

                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                </div>

            </div>

        </header>

        @isset($header)

            <div class="border-b border-slate-200 bg-white px-4 py-4 sm:px-6 lg:px-7">

                {{ $header }}

            </div>

        @endisset

        {{-- PAGE CONTENT --}}

        <main class="hermis-page-content min-h-[calc(100vh-68px)] p-4 sm:p-6 lg:p-7">

            {{ $slot }}

        </main>

    </div>

</div>

    {{-- LOGOUT CONFIRMATION --}}

    <div id="logoutConfirmModal"

        class="fixed inset-0 z-[100] hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm"

        aria-hidden="true">

        <div role="dialog" aria-modal="true" aria-labelledby="logoutConfirmTitle"

            aria-describedby="logoutConfirmDescription"

            class="w-full max-w-sm overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl">

            <div class="px-6 pb-5 pt-6 text-center">

                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-orange-50 text-[#EA580C]">

                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"

                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">

                        <path d="M10 17l5-5-5-5"/>

                        <path d="M15 12H3"/>

                        <path d="M12 3h5a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-5"/>

                    </svg>

                </div>

                <h2 id="logoutConfirmTitle" class="text-lg font-extrabold text-[#0F172A]">

                    Confirm Log Out

                </h2>

                <p id="logoutConfirmDescription" class="mt-2 text-sm leading-relaxed text-slate-500">

                    Are you sure you want to log out of your HERMIS account?

                </p>

                <div class="mt-6 flex flex-col-reverse justify-center gap-2 sm:flex-row">

                    <button type="button" id="cancelLogoutConfirm"

                        class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-300">

                        Cancel

                    </button>

                    <form method="POST" action="{{ route('logout') }}" class="m-0">

                        @csrf

                        <button type="submit"

                            class="inline-flex w-full items-center justify-center rounded-xl bg-[#EA580C] px-5 py-2.5 text-sm font-bold text-white shadow-sm transition hover:bg-[#C2410C] focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 sm:w-auto">

                            Yes, Log Out

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const logoutModal = document.getElementById('logoutConfirmModal');

            const openButton = document.getElementById('openLogoutConfirm');

            const cancelButton = document.getElementById('cancelLogoutConfirm');

            let previousBodyOverflow = '';

            if (!logoutModal || !openButton || !cancelButton) return;

            function openLogoutModal() {

                previousBodyOverflow = document.body.style.overflow;

                logoutModal.classList.remove('hidden');

                logoutModal.classList.add('flex');

                logoutModal.setAttribute('aria-hidden', 'false');

                document.body.style.overflow = 'hidden';

                cancelButton.focus();

            }

            function closeLogoutModal() {

                logoutModal.classList.add('hidden');

                logoutModal.classList.remove('flex');

                logoutModal.setAttribute('aria-hidden', 'true');

                document.body.style.overflow = previousBodyOverflow;

                openButton.focus();

            }

            openButton.addEventListener('click', openLogoutModal);

            cancelButton.addEventListener('click', closeLogoutModal);

            logoutModal.addEventListener('click', function (event) {

                if (event.target === logoutModal) closeLogoutModal();

            });

            document.addEventListener('keydown', function (event) {

                if (event.key === 'Escape' && !logoutModal.classList.contains('hidden')) {

                    closeLogoutModal();

                }

            });

        });

    </script>

@else

    <main class="min-h-screen">

        {{ $slot }}

    </main>

@endauth

</body>

</html>
