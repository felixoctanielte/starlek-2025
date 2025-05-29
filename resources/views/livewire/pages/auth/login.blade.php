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

<div class="w-full px-4 sm:px-0">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login" class="space-y-4">
        <!-- Email Address -->
        <div>
            <x-text-input
                wire:model="form.email"
                id="email"
                class="block w-full bg-white/20 text-white font-semibold placeholder-white/70 border border-white/30 backdrop-blur-md focus:ring-2 focus:ring-white focus:outline-none rounded-lg py-2 px-3 text-sm sm:text-base"
                type="email"
                name="email"
                placeholder="Email"
                required
                autofocus
                autocomplete="username" />
        </div>

        <!-- Password -->
        <div>
            <x-text-input
                wire:model="form.password"
                id="password"
                class="block w-full bg-white/20 text-white font-semibold placeholder-white/70 border border-white/30 backdrop-blur-md focus:ring-2 focus:ring-white focus:outline-none rounded-lg py-2 px-3 text-sm sm:text-base"
                type="password"
                name="password"
                placeholder="Password"
                required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('form.password')" class="mt-2 text-sm text-red-200" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mt-2">
            <input
                wire:model="form.remember"
                id="remember"
                type="checkbox"
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                name="remember">
            <label for="remember" class="ml-2 text-sm sm:text-base text-white">
                {{ __('Remember me') }}
            </label>
        </div>

        <!-- Submit + Forgot Password -->
        <div class="mt-4 flex flex-col items-center justify-center gap-2">
            <x-primary-button class="bg-blue text-white font-semibold">
                {{ __('Log in') }}
            </x-primary-button>

            @if (Route::has('password.request'))
            <a
                class="underline text-sm sm:text-base text-white hover:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('password.request') }}"
                wire:navigate>
                {{ __('Forgot your password?') }}
            </a>
            @endif

            @if (Route::has('register'))
            <a
                class="underline text-sm sm:text-base text-white hover:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('register') }}"
                wire:navigate>
                {{ __('Register here') }}
            </a>
            @endif
        </div>
    </form>
</div>