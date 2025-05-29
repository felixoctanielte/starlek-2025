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

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('login', absolute: false), navigate: true);
    }
}; ?>

<div>
    <form wire:submit="register">
        <!-- Name -->
<div>
    <x-text-input
        wire:model="name"
        id="name"
        class="block mt-1 w-full bg-white/20 text-white font-semibold placeholder-white/70 border border-white/30 backdrop-blur-md focus:ring-2 focus:ring-white focus:outline-none rounded-lg"
        type="text"
        name="name"
        required
        autofocus
        autocomplete="name"
        placeholder="Nama Lengkap" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<!-- Email -->
<div class="mt-4">
    <x-text-input
        wire:model="email"
        id="email"
        class="block mt-1 w-full bg-white/20 text-white font-semibold placeholder-white/70 border border-white/30 backdrop-blur-md focus:ring-2 focus:ring-white focus:outline-none rounded-lg"
        type="email"
        name="email"
        required
        autocomplete="username"
        placeholder="Email" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<!-- Password -->
<div class="mt-4">
    <x-text-input
        wire:model="password"
        id="password"
        class="block mt-1 w-full bg-white/20 text-white font-semibold placeholder-white/70 border border-white/30 backdrop-blur-md focus:ring-2 focus:ring-white focus:outline-none rounded-lg"
        type="password"
        name="password"
        required
        autocomplete="new-password"
        placeholder="Password" />
    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<!-- Confirm Password -->
<div class="mt-4">
    <x-text-input 
        wire:model="form.password"
        id="password"
        class="block mt-1 w-full bg-white/20 text-white font-semibold placeholder-white/70 border border-white/30 backdrop-blur-md focus:ring-2 focus:ring-white focus:outline-none rounded-lg"
        type="password"
        name="password"
        placeholder="Konfirmasi Password"
        required 
        autofocus 
        autocomplete="new-password" 
    />
</div>

        <div class="mt-4 flex flex-col items-center justify-center gap-2">
            <x-primary-button class="bg-yellow text-white font-semibold">
                {{ __('Register') }}
            </x-primary-button>

            <a
                class="underline text-sm sm:text-base text-white hover:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{ route('login') }}"
            wire:navigate>
                {{ __('Already registered?') }}
            </a>
        </div>

    </form>
</div>
