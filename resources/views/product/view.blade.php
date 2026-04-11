<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#111827] overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                {{-- Actions --}}
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <a href="{{ route('product.index') }}" class="text-gray-500 hover:text-white transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-100 uppercase tracking-tight">Product Detail</h2>
                            <p class="text-xs text-gray-500 italic mt-0.5">Viewing product #{{ $product->id }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        @can('update', $product)
                            <a href="{{ route('product.edit', $product) }}" class="inline-flex items-center gap-2 px-4 py-2 border border-amber-500 rounded text-amber-500 hover:bg-amber-500 hover:text-white text-sm font-semibold transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </a>
                        @endcan
                        @can('delete', $product)
                            <form action="{{ route('product.delete', $product) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 border border-rose-500 rounded text-rose-500 hover:bg-rose-500 hover:text-white text-sm font-semibold transition duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>

                {{-- Property List --}}
                <div class="border-t border-gray-800 divide-y divide-gray-800">
                    <div class="grid grid-cols-2 py-6 items-center">
                        <div class="text-xs font-bold text-gray-500 uppercase tracking-widest">Product Name</div>
                        <div class="text-xl font-bold text-gray-100 uppercase">{{ $product->name }}</div>
                    </div>

                    <div class="grid grid-cols-2 py-6 items-center">
                        <div class="text-xs font-bold text-gray-500 uppercase tracking-widest">Quantity</div>
                        <div>
                            <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-emerald-500/10 text-emerald-500 text-[10px] font-bold uppercase tracking-widest border border-emerald-500/20">
                                {{ $product->quantity }} IN STOCK
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 py-6 items-center">
                        <div class="text-xs font-bold text-gray-500 uppercase tracking-widest">Price</div>
                        <div class="text-xl font-bold text-gray-100">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="grid grid-cols-2 py-6 items-center">
                        <div class="text-xs font-bold text-gray-500 uppercase tracking-widest">Owner</div>
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 bg-indigo-600 rounded-full flex items-center justify-center text-[11px] font-bold text-white uppercase">
                                {{ substr($product->user->name ?? '?', 0, 1) }}
                            </div>
                            <span class="text-base font-bold text-gray-200">{{ $product->user->name ?? 'Unknown' }}</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 py-6 items-center">
                        <div class="text-xs font-bold text-gray-500 uppercase tracking-widest">Created At</div>
                        <div class="text-sm font-semibold text-gray-300">
                            {{ $product->created_at->format('d M Y, H:i') }}
                        </div>
                    </div>

                    <div class="grid grid-cols-2 py-6 items-center">
                        <div class="text-xs font-bold text-gray-500 uppercase tracking-widest">Updated At</div>
                        <div class="text-sm font-semibold text-gray-300">
                            {{ $product->updated_at->format('d M Y, H:i') }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
