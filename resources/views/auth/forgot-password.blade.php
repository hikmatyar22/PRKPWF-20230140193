<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-black text-white uppercase tracking-widest">Recovery</h2>
        <p class="text-sm text-slate-500 mt-2 font-medium">Reset your secure access</p>
    </div>

    <div class="mb-6 text-sm text-slate-400 font-bold leading-relaxed uppercase tracking-wide">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="john@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex flex-col gap-4 mt-10">
            <x-primary-button class="w-full justify-center">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
            
            <a class="text-xs font-bold text-slate-500 hover:text-white transition-colors duration-200 uppercase tracking-widest text-center" href="{{ route('login') }}">
                {{ __('Back to login') }}
            </a>
        </div>
    </form>
</x-guest-layout>
