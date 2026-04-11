<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#111827] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center py-12">
                    <h2 class="text-3xl font-bold mb-4">You're logged in!</h2>
                    <p class="text-gray-500 text-lg">Selamat datang kembali, <span class="text-indigo-500 font-bold">{{ Auth::user()->name }}</span>.</p>
                    
                    <div class="mt-10 flex justify-center gap-4">
                        <a href="{{ route('product.index') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg transition duration-200">
                            Kelola Produk
                        </a>
                        <a href="{{ route('about') }}" class="bg-gray-800 hover:bg-gray-700 text-gray-300 font-bold py-2 px-6 rounded-lg transition duration-200">
                            Tentang Saya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
