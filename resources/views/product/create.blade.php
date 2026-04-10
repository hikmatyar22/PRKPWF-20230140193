<x-app-layout>
    <div class="py-12 bg-slate-950 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1f2937] overflow-hidden shadow-2xl sm:rounded-2xl border border-slate-700">
                <div class="p-10">
                    
                    {{-- Header --}}
                    <div class="flex items-center gap-5 mb-10">
                        <a href="{{ route('product.index') }}" class="p-2 rounded-xl text-slate-500 hover:text-white hover:bg-slate-800 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <div>
                            <h2 class="text-3xl font-bold text-white tracking-tight">Add Product</h2>
                            <p class="text-sm text-slate-400 mt-1 font-medium italic">Fill in the details to add a new product</p>
                        </div>
                    </div>

                    {{-- Form --}}
                    <form action="{{ route('product.store') }}" method="POST">
                        @csrf
                        
                        {{-- Name --}}
                        <div class="mb-8">
                            <label for="name" class="block text-sm font-bold text-slate-300 mb-2">
                                Nama Produk <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. Wireless Headphones" class="w-full px-5 py-3 rounded-xl bg-slate-800 border-none text-slate-200 placeholder-slate-600 focus:ring-2 focus:ring-indigo-500 transition-all duration-200">
                            @error('name')
                                <p class="mt-2 text-xs font-bold text-red-500 uppercase">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Quantity & Price --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                            <div>
                                <label for="quantity" class="block text-sm font-bold text-slate-300 mb-2">
                                    Quantity <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="quantity" name="quantity" value="{{ old('quantity', 0) }}" class="w-full px-5 py-3 rounded-xl bg-slate-800 border-none text-slate-200 focus:ring-2 focus:ring-indigo-500 transition-all duration-200">
                                @error('quantity')
                                    <p class="mt-2 text-xs font-bold text-red-500 uppercase">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="price" class="block text-sm font-bold text-slate-300 mb-2">
                                    Price (Rp) <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="price" name="price" value="{{ old('price', 1000) }}" placeholder="1000" step="0.01" min="1000" class="w-full px-5 py-3 rounded-xl bg-slate-800 border-none text-slate-200 placeholder-slate-600 focus:ring-2 focus:ring-indigo-500 transition-all duration-200">
                                @error('price')
                                    <p class="mt-2 text-xs font-bold text-red-500 uppercase">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Actions Footer --}}
                        <div class="flex items-center justify-end gap-4 pt-6 border-t border-slate-800">
                            <a href="{{ route('product.index') }}" class="px-7 py-3 rounded-xl bg-slate-700/50 hover:bg-slate-700 text-slate-300 text-sm font-bold transition-all duration-200">
                                Cancel
                            </a>
                            <button type="submit" class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-xl shadow-lg shadow-indigo-600/20 transition-all duration-300">
                                Save Product
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
