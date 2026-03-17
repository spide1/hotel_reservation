<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- Fonts --}}
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,400;1,600&family=Jost:wght@300;400;500&display=swap" rel="stylesheet" />

        {{-- Flatpickr CSS only in head (JS loaded at bottom via @stack) --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

        {{-- Vite --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Page-level head stacks --}}
        @stack('styles')

    
            <style>
            :root {
              --gold: #c9a84c; --gold-light: #e8d08a; --gold-soft: #fdf8ed;
              --ink: #1a1710; --muted: #8a8270; --white: #fff; --border: #e8e2d0;
            }
            .nav-wrap {
              background: var(--white); border-bottom: 1px solid var(--border);
              font-family: 'Jost', sans-serif; position: sticky; top: 0; z-index: 100;
            }
            .nav-inner {
              max-width: 1200px; margin: 0 auto; padding: 0 1.5rem;
              display: flex; align-items: center; justify-content: space-between; height: 64px;
            }
            .nav-logo {
              font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 700;
              color: var(--ink); text-decoration: none; letter-spacing: -0.02em; flex-shrink: 0;
            }
            .nav-logo span { color: var(--gold); }
            .nav-links { display: flex; align-items: center; gap: 0.25rem; }
            .nav-link {
              font-size: 0.82rem; font-weight: 400; letter-spacing: 0.04em;
              color: var(--muted); text-decoration: none;
              padding: 0.4rem 0.85rem; border-radius: 8px;
              transition: all 0.18s; position: relative;
            }
            .nav-link:hover { color: var(--ink); background: #f5f3ef; }
            .nav-link.active { color: var(--ink); font-weight: 500; background: var(--gold-soft); }
            .nav-link.active::after {
              content: ''; position: absolute; bottom: -1px; left: 50%;
              transform: translateX(-50%); width: 16px; height: 2px;
              background: var(--gold); border-radius: 2px;
            }
            .nav-link-admin {
              font-size: 0.72rem; font-weight: 500; letter-spacing: 0.08em;
              text-transform: uppercase; text-decoration: none;
              padding: 0.35rem 0.9rem; border-radius: 20px;
              background: var(--gold-soft); color: var(--gold);
              border: 1px solid rgba(201,168,76,0.3); transition: all 0.18s;
            }
            .nav-link-admin:hover { background: var(--gold); color: var(--ink); }
            .nav-right { display: flex; align-items: center; gap: 0.75rem; }
            .nav-user { position: relative; }
            .nav-user-btn {
              display: flex; align-items: center; gap: 0.5rem;
              padding: 0.4rem 0.75rem 0.4rem 0.5rem;
              background: var(--white); border: 1.5px solid var(--border);
              border-radius: 30px; cursor: pointer; transition: all 0.18s;
              font-family: 'Jost', sans-serif; font-size: 0.82rem; color: var(--ink);
            }
            .nav-user-btn:hover { border-color: var(--gold); background: var(--gold-soft); }
            .nav-avatar {
              width: 28px; height: 28px; border-radius: 50%;
              background: linear-gradient(135deg, var(--gold), #e8a060);
              display: flex; align-items: center; justify-content: center;
              font-size: 0.7rem; color: var(--ink); font-weight: 700; flex-shrink: 0;
            }
            .nav-chevron { width: 14px; height: 14px; color: var(--muted); transition: transform 0.2s; }
            .nav-user.open .nav-chevron { transform: rotate(180deg); }
            .nav-dropdown {
              position: absolute; top: calc(100% + 8px); right: 0;
              background: var(--white); border: 1px solid var(--border);
              border-radius: 14px; min-width: 200px;
              box-shadow: 0 12px 40px rgba(26,23,16,0.12);
              overflow: hidden; display: none;
              animation: fadeUp 0.18s ease both;
            }
            .nav-user.open .nav-dropdown { display: block; }
            .dropdown-header {
              padding: 0.9rem 1rem 0.7rem; border-bottom: 1px solid var(--border); background: #faf9f6;
            }
            .dropdown-header .d-name { font-size: 0.85rem; font-weight: 600; color: var(--ink); }
            .dropdown-header .d-email { font-size: 0.72rem; color: var(--muted); font-weight: 300; margin-top: 1px; }
            .dropdown-item {
              display: flex; align-items: center; gap: 0.6rem;
              padding: 0.65rem 1rem; font-size: 0.82rem; color: var(--ink);
              text-decoration: none; cursor: pointer; transition: background 0.15s;
              width: 100%; background: none; border: none;
              font-family: 'Jost', sans-serif; text-align: left;
            }
            .dropdown-item:hover { background: #f5f3ef; }
            .dropdown-item.danger { color: #dc2626; }
            .dropdown-item.danger:hover { background: #fef2f2; }
            .dropdown-icon { font-size: 0.9rem; width: 18px; text-align: center; }
            .btn-login {
              font-size: 0.82rem; color: var(--muted); text-decoration: none;
              padding: 0.4rem 0.8rem; border-radius: 8px; transition: all 0.18s;
            }
            .btn-login:hover { color: var(--ink); background: #f5f3ef; }
            .btn-register {
              font-size: 0.82rem; font-weight: 500; text-decoration: none;
              padding: 0.4rem 1rem; border-radius: 8px;
              background: var(--ink); color: white; transition: all 0.18s;
            }
            .btn-register:hover { background: var(--gold); color: var(--ink); }
            .nav-hamburger {
              display: none; flex-direction: column; gap: 5px;
              cursor: pointer; padding: 0.4rem; background: none; border: none;
            }
            .nav-hamburger span {
              display: block; width: 22px; height: 2px;
              background: var(--ink); border-radius: 2px; transition: all 0.25s;
            }
            .nav-mobile {
              display: none; border-top: 1px solid var(--border);
              background: var(--white); padding: 1rem 1.5rem 1.5rem;
            }
            .nav-mobile.open { display: block; }
            .mobile-links { display: flex; flex-direction: column; gap: 0.25rem; margin-bottom: 1rem; }
            .mobile-link {
              font-size: 0.88rem; color: var(--ink); text-decoration: none;
              padding: 0.6rem 0.75rem; border-radius: 9px; transition: background 0.15s;
              display: flex; align-items: center; gap: 0.5rem;
            }
            .mobile-link:hover { background: #f5f3ef; }
            .mobile-link.active { background: var(--gold-soft); color: var(--gold); font-weight: 500; }
            .mobile-user-info { padding: 0.8rem 0.75rem; border-top: 1px solid var(--border); margin-top: 0.5rem; padding-top: 1rem; }
            .mobile-user-name { font-size: 0.88rem; font-weight: 600; color: var(--ink); }
            .mobile-user-email { font-size: 0.75rem; color: var(--muted); margin-top: 1px; }
            .mobile-actions { display: flex; flex-direction: column; gap: 0.25rem; margin-top: 0.75rem; }
            @keyframes fadeUp { from{opacity:0;transform:translateY(6px)} to{opacity:1;transform:translateY(0)} }
            @media (max-width: 768px) {
              .nav-links, .nav-right .btn-login, .nav-right .btn-register,
              .nav-right .nav-user { display: none; }
              .nav-hamburger { display: flex !important; }
            }
            
            
            </style>
        
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            <livewire:layout.navigation />

            {{-- Page Heading --}}
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            {{-- Page Content --}}
            <main>
                {{ $slot }}
            </main>

        </div>

        {{-- Flatpickr JS once at bottom --}}
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        {{-- Page scripts injected here --}}
        @stack('scripts')
    </body>
</html>