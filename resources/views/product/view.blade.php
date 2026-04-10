<x-app-layout>
    <div class="py-12 bg-slate-950 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-900 overflow-hidden shadow-2xl sm:rounded-2xl border border-slate-800">
                <div class="p-10">
                    
                    {{-- Header --}}
                    <div class="flex items-center justify-between mb-10">
                        <div class="flex items-center gap-5">
                            <a href="{{ route('product.index') }}" class="p-2.5 rounded-xl text-slate-500 hover:text-white hover:bg-slate-800 transition-all duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                                </svg>
                            </a>
                            <div>
                                <h1 class="text-3xl font-bold text-white tracking-tight">Product Detail</h1>
                                <p class="text-sm text-slate-500 mt-1 font-medium italic">Viewing product #{{ $product->id }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            @can('update', $product)
                                <a href="{{ route('product.edit', $product) }}" class="inline-flex items-center gap-2 px-5 py-2 rounded-xl bg-amber-500/5 hover:bg-amber-500/10 border border-amber-500/40 text-amber-500 text-sm font-bold transition-all duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </a>
                            @endcan
                            @can('delete', $product)
                                <form action="{{ route('product.delete', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-2 px-5 py-2 rounded-xl bg-rose-500/5 hover:bg-rose-500/10 border border-rose-500/40 text-rose-500 text-sm font-bold transition-all duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>

                    {{-- Info Grid --}}
                    <div class="rounded-2xl border border-slate-800 divide-y divide-slate-800">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 px-10 py-8 items-center">
                            <div class="text-sm font-bold text-slate-500 uppercase tracking-widest">Product Name</div>
                            <div class="text-lg font-bold text-slate-100 whitespace-nowrap">{{ $product->name }}</div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 px-10 py-8 items-center">
                            <div class="text-sm font-bold text-slate-500 uppercase tracking-widest">Quantity</div>
                            <div>
                                <span class="inline-flex px-4 py-1 rounded-full text-xs font-black uppercase tracking-widest {{ $product->quantity > 10 ? 'bg-emerald-500/10 text-emerald-500 border border-emerald-500/20' : 'bg-rose-500/10 text-rose-500 border border-rose-500/20' }}">
                                    {{ $product->quantity }} {{ $product->quantity > 10 ? 'In Stock' : 'Low Stock' }}
                                </span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 px-10 py-8 items-center">
                            <div class="text-sm font-bold text-slate-500 uppercase tracking-widest">Price</div>
                            <div class="text-lg font-bold text-slate-100">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 px-10 py-8 items-center">
                            <div class="text-sm font-bold text-slate-500 uppercase tracking-widest">Owner</div>
                            <div class="flex items-center gap-3">
                                <div class="h-7 w-7 rounded-full bg-indigo-600/30 flex items-center justify-center text-indigo-400 text-[11px] font-black uppercase">
                                    {{ substr($product->user->name ?? '?', 0, 1) }}
                                </div>
                                <span class="text-base font-bold text-slate-200">{{ $product->user->name ?? 'Unknown' }}</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 px-10 py-8 items-center">
                            <div class="text-sm font-bold text-slate-500 uppercase tracking-widest">Created At</div>
                            <div class="text-sm font-semibold text-slate-300">
                                {{ $product->created_at->format('d M Y, H:i') }}
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 px-10 py-8 items-center">
                            <div class="text-sm font-bold text-slate-500 uppercase tracking-widest">Updated At</div>
                            <div class="text-sm font-semibold text-slate-300">
                                {{ $product->updated_at->format('d M Y, H:i') }}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
