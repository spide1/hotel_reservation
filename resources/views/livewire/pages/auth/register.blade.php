<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function register(): void
    {
        $validated = $this->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="register-wrap">
<div class="register-card">

    {{-- Header --}}
    <div class="register-header">
        <a href="{{ url('/') }}" wire:navigate
           style="display:inline-flex;align-items:center;gap:0.5rem;
                  text-decoration:none;justify-content:center;margin-bottom:1.2rem;">
            @if(file_exists(public_path('images/logo.jpg')))
                <img src="{{ asset('images/logo.jpg') }}"
                     style="height:42px;width:42px;object-fit:cover;
                            border-radius:10px;border:1.5px solid rgba(201,168,76,0.4);">
            @else
                <div style="width:42px;height:42px;border-radius:10px;
                            background:rgba(201,168,76,0.15);
                            border:1.5px solid rgba(201,168,76,0.3);
                            display:flex;align-items:center;justify-content:center;
                            font-family:'Cormorant Garamond',serif;
                            font-size:1.3rem;font-weight:700;color:var(--gold-light);">
                    {{ strtoupper(substr(config('app.name', 'G'), 0, 1)) }}
                </div>
            @endif
            <span style="font-family:'Cormorant Garamond',serif;font-size:1.3rem;
                         font-weight:700;color:white;letter-spacing:-0.01em;">
                {{ config('app.name', 'Grand Hotel') }}<span style="color:var(--gold-light);">.</span>
            </span>
        </a>
        <h1>Create <em>Account</em></h1>
        <p>Join us for an exceptional stay</p>
    </div>

    {{-- Body --}}
    <div class="register-body">
        <form wire:submit="register">

            {{-- Name & Email --}}
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input wire:model="name"
                           id="name" type="text" name="name"
                           placeholder="John Doe"
                           required autofocus autocomplete="name">
                    @error('name')
                        <div class="error-msg">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input wire:model="email"
                           id="email" type="email" name="email"
                           placeholder="you@example.com"
                           required autocomplete="username">
                    @error('email')
                        <div class="error-msg">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="password-divider"></div>

            {{-- Password & Confirm --}}
            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input wire:model="password"
                           id="password" type="password" name="password"
                           placeholder="••••••••"
                           required autocomplete="new-password">
                    @error('password')
                        <div class="error-msg">{{ $message }}</div>
                    @enderror
                    <div class="password-hint">Min. 8 characters</div>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input wire:model="password_confirmation"
                           id="password_confirmation" type="password"
                           name="password_confirmation"
                           placeholder="••••••••"
                           required autocomplete="new-password">
                    @error('password_confirmation')
                        <div class="error-msg">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-register">
                Create Account
            </button>

        </form>
    </div>

    {{-- Footer --}}
    <div class="register-footer">
        Already have an account?
        <a href="{{ route('login') }}" wire:navigate>Sign in</a>
    </div>

</div>
</div>