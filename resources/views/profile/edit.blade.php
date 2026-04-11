<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-black text-white tracking-tighter uppercase">Profile Settings</h1>
        <p class="text-sm text-slate-500 font-bold mt-1 uppercase tracking-widest">Manage your personal identity and security</p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
            {{-- Update Info Section --}}
            <div class="p-10 sm:p-12 bg-slate-900/50 backdrop-blur-xl shadow-2xl rounded-[2.5rem] border border-slate-800 animate-slide-up">
                <div class="max-w-2xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Update Password Section --}}
            <div class="p-10 sm:p-12 bg-slate-900/50 backdrop-blur-xl shadow-2xl rounded-[2.5rem] border border-slate-800 animate-slide-up [animation-delay:200ms]">
                <div class="max-w-2xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Delete Account Section --}}
            <div class="p-10 sm:p-12 bg-slate-900/50 backdrop-blur-xl shadow-2xl rounded-[2.5rem] border border-rose-500/10 animate-slide-up [animation-delay:400ms]">
                <div class="max-w-2xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
