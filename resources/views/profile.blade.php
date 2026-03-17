<x-app-layout>
    <x-slot name="header">
        {{-- Page Header --}}
        <div class="py-2">
            <p class="text-xs font-semibold tracking-widest uppercase text-orange-500">Account</p>
            <h2 class="font-serif text-2xl font-bold text-gray-900 leading-tight">Your Profile</h2>
            <p class="text-sm text-gray-500 mt-0.5">Manage your personal information and security settings.</p>
        </div>
    </x-slot>

    <style>
        body { background: #f7f7fb; }

        .profile-hero {
            background: white;
            border: 1px solid #e8e8f0;
            border-radius: 18px;
            padding: 1.5rem 2rem;
            display: flex;
            align-items: center;
            gap: 1.25rem;
            box-shadow: 0 2px 20px rgba(26,26,46,0.07);
            transition: box-shadow 0.2s;
        }
        .profile-hero:hover { box-shadow: 0 8px 40px rgba(26,26,46,0.13); }

        .hero-avatar {
            width: 68px; height: 68px;
            border-radius: 50%;
            background: linear-gradient(135deg, #e8613c, #f0a080);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.6rem; color: white; font-weight: 700;
            flex-shrink: 0;
            position: relative;
        }
        .hero-avatar::after {
            content: '';
            position: absolute; inset: -3px;
            border-radius: 50%;
            border: 2px dashed rgba(232,97,60,0.3);
            animation: spin 12s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        .profile-card {
            background: white;
            border: 1px solid #e8e8f0;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 2px 20px rgba(26,26,46,0.07);
            transition: box-shadow 0.2s;
            animation: fadeUp 0.4s ease both;
        }
        .profile-card:hover { box-shadow: 0 8px 40px rgba(26,26,46,0.13); }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .card-icon {
            width: 36px; height: 36px;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem;
        }
        .danger-card {
            background: #fdf0ef;
            border: 1.5px solid rgba(192,57,43,0.15);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 2px 20px rgba(26,26,46,0.05);
        }
    </style>

    <div class="py-10">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 space-y-5">

            {{-- Profile Hero --}}
            <div class="profile-hero">
                <div class="hero-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <div>
                    <h2 class="text-lg font-bold text-gray-900">{{ Auth::user()->name }}</h2>
                    <p class="text-sm text-gray-400">{{ Auth::user()->email }}</p>
                </div>
                <div class="ml-auto text-xs font-medium px-3 py-1.5 rounded-full text-orange-500 bg-orange-50 border border-orange-100">
                    ✦ Active
                </div>
            </div>

            {{-- Update Profile --}}
            <div class="profile-card">
                <div class="flex items-center gap-3 px-7 pt-5">
                    <div class="card-icon bg-blue-50">👤</div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Profile Information</h3>
                        <p class="text-xs text-gray-400">Update your name and email address</p>
                    </div>
                </div>
                <div class="px-7 pt-4 pb-6">
                    <livewire:profile.update-profile-information-form />
                </div>
                <div class="px-7 py-4 border-t border-gray-100 bg-gray-50 flex justify-end">
                    {{-- form submit button is inside the Livewire component --}}
                </div>
            </div>

            {{-- Update Password --}}
            <div class="profile-card" style="animation-delay:0.08s">
                <div class="flex items-center gap-3 px-7 pt-5">
                    <div class="card-icon bg-green-50">🔐</div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Update Password</h3>
                        <p class="text-xs text-gray-400">Choose a strong, unique password</p>
                    </div>
                </div>
                <div class="px-7 pt-4 pb-6">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            {{-- Delete Account --}}
            <div class="danger-card" style="animation: fadeUp 0.4s ease 0.15s both;">
                <div class="flex items-center gap-3 px-7 pt-5">
                    <div class="card-icon bg-red-50">⚠️</div>
                    <div>
                        <h3 class="font-semibold text-red-700">Delete Account</h3>
                        <p class="text-xs text-red-400">Permanently remove your account and all data</p>
                    </div>
                </div>
                <div class="px-7 py-3">
                    <p class="text-sm text-red-600 bg-red-100/60 rounded-xl px-4 py-3 mb-4 leading-relaxed">
                        Once deleted, all your data is permanently removed and cannot be recovered.
                    </p>
                    <livewire:profile.delete-user-form />
                </div>
            </div>

        </div>
    </div>
</x-app-layout>