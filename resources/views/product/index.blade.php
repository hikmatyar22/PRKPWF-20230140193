<x-app-layout>
    <div class="py-12 bg-slate-950 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-900/50 backdrop-blur-xl overflow-hidden shadow-2xl sm:rounded-2xl border border-slate-800">
                <div class="p-8">
                    
                    {{-- Header --}}
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
                        <div>
                            <h2 class="text-2xl font-bold text-white tracking-tight">Product List</h2>
                            <p class="text-sm text-slate-400 mt-1 font-medium">Manage your product inventory</p>
                        </div>
                        <div class="flex items-center gap-3">
                            @can('export-product')
                                <a href="{{ route('product.export') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-emerald-500/10 hover:bg-emerald-500 text-emerald-400 hover:text-white text-sm font-bold rounded-xl transition-all duration-300 border border-emerald-500/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    Export Data
                                </a>
                            @endcan

                            <a href="{{ route('product.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-xl transition-all duration-300 shadow-lg shadow-indigo-600/20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Add New Product
                            </a>
                        </div>
                    </div>

                    {{-- Data Table --}}
                    <div class="overflow-hidden rounded-xl border border-slate-800">
                        <table class="w-full text-sm text-left">
                            <thead>
                                <tr class="bg-slate-800/30 border-b border-slate-800">
                                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center w-16">#</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Name</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Quantity</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Price</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Owner</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800">
                                @forelse ($products as $product)
                                    <tr class="hover:bg-slate-800/10 transition-all duration-200">
                                        <td class="px-6 py-6 text-slate-500 text-center font-medium">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-6 text-slate-200 font-semibold">{{ $product->name }}</td>
                                        <td class="px-6 py-6 text-center">
                                            <div class="inline-flex items-center justify-center w-8 h-8 rounded-full text-[11px] font-black {{ $product->quantity > 10 ? 'bg-emerald-500/10 text-emerald-500 border border-emerald-500/20' : 'bg-red-500/10 text-red-500 border border-red-500/20' }}">
                                                {{ $product->quantity }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-6 text-slate-200 font-medium">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                        <td class="px-6 py-6 text-slate-400 font-medium">{{ $product->user->name ?? '-' }}</td>
                                        <td class="px-6 py-6 text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('product.show', $product) }}" class="inline-flex items-center p-2 rounded-lg text-slate-500 hover:text-white hover:bg-slate-800 transition-all duration-200" title="View Detail">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>

                                                @can('update', $product)
                                                    <a href="{{ route('product.edit', $product) }}" class="inline-flex items-center p-2 rounded-lg text-amber-500/50 hover:text-amber-500 hover:bg-amber-500/10 transition-all duration-200" title="Edit Product">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </a>
                                                @endcan

                                                @can('delete', $product)
                                                    <form action="{{ route('product.delete', $product) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="inline-flex items-center p-2.5 rounded-xl text-rose-500/50 hover:text-rose-500 hover:bg-rose-500/10 transition-all duration-300" title="Direct Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-20 text-center">
                                            <p class="text-slate-500 font-medium italic">No products available in inventory.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
