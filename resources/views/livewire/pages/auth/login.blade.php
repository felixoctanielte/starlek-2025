<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
        <!-- Email Address -->
<div>
    <x-text-input 
        wire:model="form.email"
        id="email"
        class="block mt-1 w-full bg-white/20 text-white placeholder-white/70 border border-white/30 backdrop-blur-md focus:ring-2 focus:ring-white focus:outline-none rounded-lg"
        type="email"
        name="email"
        placeholder="Email"
        required 
        autofocus 
        autocomplete="username" 
    />
</div>

<!-- Password -->
<div class="mt-4">
    <x-text-input 
        wire:model="form.password"
        id="password"
        class="block mt-1 w-full bg-white/20 text-white placeholder-white/70 border border-white/30 backdrop-blur-md focus:ring-2 focus:ring-white focus:outline-none rounded-lg"
        type="password"
        name="password"
        placeholder="Password"
        required 
        autofocus 
        autocomplete="new-password" 
    />
    <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
</div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-6 flex flex-col items-center justify-center gap-2">
            <x-primary-button class="bg-white text-gray-800 hover:bg-gray-100 font-semibold">
                {{ __('Log in') }}
            </x-primary-button>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" 
                href="{{ route('password.request') }}" 
                wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

    </form>
</div>
