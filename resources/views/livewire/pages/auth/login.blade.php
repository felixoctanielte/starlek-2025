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

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Ganti @vite dengan Tailwind CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">

    @livewireStyles
</head>


<body class="min-h-screen h-full bg-cover bg-center bg-no-repeat antialiased"
      style="background-image: url('{{ asset('images/bg.png') }}');">

    {{-- Background full screen --}}
    <div class="min-h-screen w-full flex flex-col items-center justify-center bg-cover bg-center bg-no-repeat px-4" 
         style="background-image: url('/images/bg.png');">

        {{-- Title --}}
        <h2 class="text-white text-4xl font-bold drop-shadow-lg mb-4 text-center">Login</h2>

        {{-- Login Form Box --}}
        <div class="w-full max-w-md bg-white/10 backdrop-blur-md border border-white/30 rounded-2xl px-8 py-10 shadow-2xl text-white">
            
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form wire:submit="login">
                {{-- Email --}}
                <div>
                    <x-text-input 
                        wire:model="form.email"
                        id="email"
                        class="block w-full mt-1 bg-white/20 text-white placeholder-white/70 border border-white/30 backdrop-blur-sm focus:ring-2 focus:ring-white focus:outline-none rounded-md"
                        type="email"
                        placeholder="Email"
                        required 
                        autofocus 
                    />
                </div>

                {{-- Password --}}
                <div class="mt-4">
                    <x-text-input 
                        wire:model="form.password"
                        id="password"
                        class="block w-full mt-1 bg-white/20 text-white placeholder-white/70 border border-white/30 backdrop-blur-sm focus:ring-2 focus:ring-white focus:outline-none rounded-md"
                        type="password"
                        placeholder="Password"
                        required 
                    />
                    <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                </div>

                {{-- Remember Me --}}
                <div class="block mt-4">
                    <label for="remember" class="inline-flex items-center">
                        <input wire:model="form.remember" id="remember" type="checkbox"
                            class="rounded border-white/30 text-white bg-transparent shadow-sm focus:ring-white"
                            name="remember">
                        <span class="ms-2 text-sm text-white">{{ __('Remember me') }}</span>
                    </label>
                </div>

                {{-- Button --}}
                <div class="mt-6">
                    <x-primary-button class="w-full bg-white text-gray-800 hover:bg-gray-100 font-semibold rounded-full">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        {{-- Additional Links --}}
        <div class="mt-6 text-center">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-white hover:text-gray-200 block"
                    href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <div class="text-sm text-white/80 mt-2">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="text-blue-300 hover:underline">Register</a>
            </div>
        </div>
    </div>

</body>

</html>

