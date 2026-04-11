<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#111827] overflow-hidden shadow-sm sm:rounded-lg p-10">
                
                {{-- Header --}}
                <div class="flex items-center gap-4 mb-8">
                    <a href="{{ route('product.index') }}" class="text-gray-500 hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-100 uppercase tracking-tight">Edit Product</h2>
                        <p class="text-xs text-gray-500 italic mt-0.5">Modify the details of product #{{ $product->id }}</p>
                    </div>
                </div>

                {{-- Form --}}
                <form action="{{ route('product.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    {{-- Name --}}
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-semibold text-gray-300 mb-2">
                            Nama Produk <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="e.g. Wireless Headphones" class="w-full px-4 py-2.5 rounded-lg bg-[#0b1120] border-gray-800 text-gray-200 focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition duration-200" required>
                        @error('name')
                            <p class="mt-2 text-xs font-bold text-rose-500 uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Quantity & Price --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label for="quantity" class="block text-sm font-semibold text-gray-300 mb-2">
                                Quantity <span class="text-rose-500">*</span>
                            </label>
                            <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" class="w-full px-4 py-2.5 rounded-lg bg-[#0b1120] border-gray-800 text-gray-200 focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition duration-200" required>
                            @error('quantity')
                                <p class="mt-2 text-xs font-bold text-rose-500 uppercase">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="price" class="block text-sm font-semibold text-gray-300 mb-2">
                                Price (Rp) <span class="text-rose-500">*</span>
                            </label>
                            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" step="0.01" min="1000" class="w-full px-4 py-2.5 rounded-lg bg-[#0b1120] border-gray-800 text-gray-200 focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition duration-200" required>
                            @error('price')
                                <p class="mt-2 text-xs font-bold text-rose-500 uppercase">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center justify-end gap-3 pt-4">
                        <a href="{{ route('product.index') }}" class="px-6 py-2.5 rounded-lg bg-gray-800 text-gray-300 text-sm font-semibold hover:bg-gray-700 transition duration-200">
                            Cancel
                        </a>
                        <button type="submit" class="px-8 py-2.5 bg-[#4f46e5] hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow-lg transition duration-200">
                            Update Product
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
