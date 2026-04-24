<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#111827] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-6">
                        <p class="text-lg font-medium">List of Products</p>
                        <div class="flex gap-2">
                            @can('export-product')
                                <a href="{{ route('product.export') }}" class="bg-gray-800 hover:bg-gray-700 text-gray-300 font-bold py-2 px-4 rounded transition border border-gray-700">
                                    Export CSV Data
                                </a>
                            @endcan
                            <x-add-product :url="route('product.create')" name="Produk" />
                        </div>
                    </div>

                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b dark:border-gray-800">
                                <th class="py-4 px-4 text-sm font-semibold">ID</th>
                                <th class="py-4 px-4 text-sm font-semibold">Nama Produk</th>
                                <th class="py-4 px-4 text-sm font-semibold text-center">Qty</th>
                                <th class="py-4 px-4 text-sm font-semibold text-center">Harga</th>
                                <th class="py-4 px-4 text-sm font-semibold text-center">Owner</th>
                                <th class="py-4 px-4 text-sm font-semibold text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="border-b dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                                    <td class="py-4 px-4 text-sm">{{ $product->id }}</td>
                                    <td class="py-4 px-4 text-sm font-medium">{{ $product->name }}</td>
                                    <td class="py-4 px-4 text-sm text-center">
                                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-emerald-500/20 text-emerald-500 text-xs font-bold border border-emerald-500/20">
                                            {{ $product->quantity }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 text-sm text-center">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </td>
                                    <td class="py-4 px-4 text-sm text-center">{{ $product->user->name }}</td>
                                    <td class="py-4 px-4 text-sm">
                                        <div class="flex justify-center items-center gap-4">
                                            <a href="{{ route('product.show', $product) }}" class="text-gray-500 hover:text-white transition" title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            
                                            @can('update', $product)
                                                    <x-edit-button :url="route('product.edit', $product)" />
                                            @endcan

                                            @can('delete', $product)
                                                    <x-delete-button :url="route('product.delete', $product)" />
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($products->isEmpty())
                        <div class="py-10 text-center text-gray-500">
                            Tidak ada produk yang ditemukan.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
