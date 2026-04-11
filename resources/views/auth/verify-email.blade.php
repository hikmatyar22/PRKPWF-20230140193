<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-black text-white uppercase tracking-widest">Verification</h2>
        <p class="text-sm text-slate-500 mt-2 font-medium">Verify your access</p>
    </div>

    <div class="mb-6 text-sm text-slate-400 font-bold leading-relaxed uppercase tracking-wide">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-6 font-bold text-sm text-emerald-500 bg-emerald-500/10 border border-emerald-500/20 p-4 rounded-xl uppercase tracking-widest">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-10 flex flex-col gap-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button class="w-full justify-center">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="w-full text-xs font-bold text-slate-500 hover:text-white transition-colors duration-200 uppercase tracking-widest text-center">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
