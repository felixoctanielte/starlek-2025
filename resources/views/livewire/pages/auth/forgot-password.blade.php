<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<div>
    <div class="mb-4 text-sm text-white">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink">
    <!-- Email Address -->
    <div>
        <x-input-label for="email" />
        <x-text-input 
            wire:model="email" 
            id="email" 
            class="block mt-1 w-full 
                   bg-white/20 text-white 
                   placeholder-white/70 
                   border border-white/30 
                   backdrop-blur-md 
                   focus:ring-2 focus:ring-white 
                   focus:outline-none 
                   rounded-lg"
            type="email" 
            name="email" 
            placeholder="Your Email"
            required 
            autofocus 
        />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Button Centered with Glass Style -->
    <div class="flex justify-center mt-6">
        <x-primary-button 
            class="bg-white text-gray-800 hover:bg-gray-100 font-semibold px-6 py-2 rounded-lg shadow-md transition duration-200"
        >
            {{ __('Email Password Reset Link') }}
        </x-primary-button>
    </div>
</form>
</div>
