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

<div class="min-h-screen flex items-center justify-center bg-gradient-to-tr from-indigo-900 via-purple-800 to-indigo-900 px-4">
    <div class="w-full max-w-md p-8 bg-white/10 rounded-2xl shadow-xl backdrop-blur-md">
        <!-- Judul -->
        <h2 class="text-center text-3xl font-bold text-white mb-6">Login to your account</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Form Login -->
        <form wire:submit="login" class="space-y-5">
            <!-- Email -->
            <div>
                <x-text-input 
                    wire:model="form.email"
                    id="email"
                    class="w-full bg-white/20 text-white placeholder-white/70 border border-white/30 backdrop-blur-md focus:ring-2 focus:ring-white focus:outline-none rounded-lg px-4 py-2"
                    type="email"
                    name="email"
                    placeholder="Email"
                    required 
                    autofocus 
                    autocomplete="username" 
                />
            </div>

            <!-- Password -->
            <div>
                <x-text-input 
                    wire:model="form.password"
                    id="password"
                    class="w-full bg-white/20 text-white placeholder-white/70 border border-white/30 backdrop-blur-md focus:ring-2 focus:ring-white focus:outline-none rounded-lg px-4 py-2"
                    type="password"
                    name="password"
                    placeholder="Password"
                    required 
                    autocomplete="current-password" 
                />
                <x-input-error :messages="$errors->get('form.password')" class="mt-2 text-sm text-red-200" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between text-sm text-white">
                <label for="remember" class="inline-flex items-center">
                    <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2">Remember me</span>
                </label>
                
                @if (Route::has('password.request'))
                    <a class="underline hover:text-gray-200" href="{{ route('password.request') }}" wire:navigate>
                        Forgot password?
                    </a>
                @endif
            </div>

            <!-- Tombol Login -->
            <div>
                <x-primary-button class="w-full bg-white text-gray-800 hover:bg-gray-100 font-semibold py-2 px-4 rounded-lg">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
