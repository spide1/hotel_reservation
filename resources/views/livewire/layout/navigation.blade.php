<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/', navigate: true);
    }
}; ?>

<nav class="nav-wrap" x-data="{
    open: false,
    userOpen: false,
    isMobile: window.innerWidth <= 768,
    init() {
        window.addEventListener('resize', () => {
            this.isMobile = window.innerWidth <= 768;
            if (!this.isMobile) this.open = false;
        });
    }
}">

    <div class="nav-inner">

        {{-- LOGO --}}
        <div class="shrink-0 flex items-center">
            <a href="/" wire:navigate>
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </a>
        </div>

        {{-- DESKTOP LINKS --}}
        <div class="nav-links">
            <a href="/"            class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
            <a href="/rooms"       class="nav-link {{ request()->is('rooms') ? 'active' : '' }}">Rooms</a>
            @auth
            <a href="/my-bookings" class="nav-link {{ request()->is('my-bookings') ? 'active' : '' }}">My Reservations</a>
            @if(auth()->user()->role == 'admin')
            <a href="/admin/dashboard" class="nav-link-admin">✦ Admin</a>
            @endif
            @endauth
        </div>

        {{-- RIGHT SIDE --}}
        <div class="nav-right">

            @auth
            <div class="nav-user" :class="{ open: userOpen }" @click.outside="userOpen = false">
                <button class="nav-user-btn" @click="userOpen = !userOpen">
                    <div class="nav-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <span x-data="{{ json_encode(['name' => auth()->user()->name]) }}"
                          x-text="name"
                          x-on:profile-updated.window="name = $event.detail.name">
                    </span>
                    <svg class="nav-chevron" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1
                                 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0
                                 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <div class="nav-dropdown">
                    <div class="dropdown-header">
                        <div class="d-name">{{ auth()->user()->name }}</div>
                        <div class="d-email">{{ auth()->user()->email }}</div>
                    </div>
                    <a href="{{ route('profile') }}" class="dropdown-item" wire:navigate>
                        <span class="dropdown-icon">👤</span> Profile
                    </a>
                    <button wire:click="logout" class="dropdown-item danger">
                        <span class="dropdown-icon">🚪</span> Log Out
                    </button>
                </div>
            </div>
            @endauth

            @guest
            <a href="{{ route('login') }}"    class="btn-login">Login</a>
            <a href="{{ route('register') }}" class="btn-register">Register</a>
            @endguest

            <button class="nav-hamburger"
                    x-show="isMobile"
                    @click="open = !open"
                    style="display:none">
                <span :style="open ? 'transform:rotate(45deg) translate(5px,5px)' : ''"></span>
                <span :style="open ? 'opacity:0' : ''"></span>
                <span :style="open ? 'transform:rotate(-45deg) translate(5px,-5px)' : ''"></span>
            </button>

        </div>
    </div>

    {{-- MOBILE MENU --}}
    <div class="nav-mobile" x-show="open && isMobile" x-transition>
        <div class="mobile-links">
            <a href="/"            class="mobile-link {{ request()->is('/') ? 'active' : '' }}">🏠 Home</a>
            <a href="/rooms"       class="mobile-link {{ request()->is('rooms') ? 'active' : '' }}">🛏 Rooms</a>
            @auth
            <a href="/my-bookings" class="mobile-link {{ request()->is('my-bookings') ? 'active' : '' }}">📋 My Reservations</a>
            @if(auth()->user()->role == 'admin')
            <a href="/admin/dashboard" class="mobile-link">✦ Admin Dashboard</a>
            @endif
            @endauth
        </div>

        @auth
        <div class="mobile-user-info">
            <div class="mobile-user-name">{{ auth()->user()->name }}</div>
            <div class="mobile-user-email">{{ auth()->user()->email }}</div>
        </div>
        <div class="mobile-actions">
            <a href="{{ route('profile') }}" class="mobile-link" wire:navigate>👤 Profile</a>
            <button wire:click="logout"
                    class="mobile-link"
                    style="border:none;cursor:pointer;background:none;color:#dc2626;width:100%;text-align:left;">
                🚪 Log Out
            </button>
        </div>
        @endauth

        @guest
        <div style="display:flex;gap:0.75rem;margin-top:0.75rem;">
            <a href="{{ route('login') }}"    class="btn-login"    style="flex:1;text-align:center;">Login</a>
            <a href="{{ route('register') }}" class="btn-register" style="flex:1;text-align:center;">Register</a>
        </div>
        @endguest
    </div>

</nav>