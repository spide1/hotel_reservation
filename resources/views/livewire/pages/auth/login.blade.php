<?php
use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    public function login(): void
    {
        $this->validate();
        $this->form->authenticate();
        Session::regenerate();

        if (auth()->user()->role === 'admin') {
            $this->redirect(route('admin.dashboard'), navigate: true);
            return;
        }

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="login-wrap">
<div class="login-card">

    <div class="login-header">
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
        <h1>Welcome <em>Back</em></h1>
        <p>Sign in to your account</p>
    </div>

    <div class="login-body">
        @if(session('status'))
        <div class="status-msg">{{ session('status') }}</div>
        @endif

        <form wire:submit="login">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input wire:model="form.email" id="email" type="email"
                       name="email" placeholder="you@example.com"
                       required autofocus autocomplete="username">
                @error('form.email')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input wire:model="form.password" id="password" type="password"
                       name="password" placeholder="••••••••"
                       required autocomplete="current-password">
                @error('form.password')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="remember-row">
                <input wire:model="form.remember" id="remember"
                       type="checkbox" name="remember">
                <label for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn-login">Sign In</button>
        </form>
    </div>

    <div class="login-footer">
        Don't have an account?
        <a href="{{ route('register') }}" wire:navigate>Create one</a>
    </div>

</div>
</div>