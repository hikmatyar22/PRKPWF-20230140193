<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-black text-white uppercase tracking-widest">Sign In</h2>
        <p class="text-sm text-slate-500 mt-2 font-medium">Welcome back to your professional inventory</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">Email
                Address</label>
            <x-text-input id="email"
                class="block w-full bg-slate-950 border-slate-800 text-white focus:border-indigo-500 focus:ring-indigo-500/10 rounded-xl"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-rose-500 text-xs font-bold uppercase" />
        </div>

        <!-- Password -->
        <div class="mt-6">
            <label for="password"
                class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">Password</label>
            <x-text-input id="password"
                class="block w-full bg-slate-950 border-slate-800 text-white focus:border-indigo-500 focus:ring-indigo-500/10 rounded-xl"
                type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')"
                class="mt-2 text-rose-500 text-xs font-bold uppercase" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded-lg bg-slate-950 border-slate-800 text-indigo-600 shadow-sm focus:ring-indigo-500 focus:ring-offset-slate-900"
                    name="remember">
                <span class="ms-2 text-sm font-bold text-slate-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col gap-4 mt-8">
            <x-primary-button
                class="w-full justify-center py-4 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-black rounded-xl shadow-lg shadow-indigo-600/20 transition-all duration-300 uppercase tracking-widest">
                {{ __('Log in') }}
            </x-primary-button>

            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a class="text-xs font-bold text-slate-500 hover:text-white transition-colors duration-200 uppercase tracking-wider"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif

                <a class="text-xs font-bold text-indigo-400 hover:text-indigo-300 transition-colors duration-200 uppercase tracking-wider"
                    href="{{ route('register') }}">
                    {{ __("Create Account") }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>