<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#111827] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-6">
                        <div>
                            <p class="text-lg font-medium">Category List</p>
                            <p class="text-sm text-gray-500">Manage your category</p>
                        </div>
                        <x-add-product :url="route('category.create')" name="Category" />
                    </div>

                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b dark:border-gray-800">
                                <th class="py-4 px-4 text-sm font-semibold">ID</th>
                                <th class="py-4 px-4 text-sm font-semibold">NAME</th>
                                <th class="py-4 px-4 text-sm font-semibold text-center">TOTAL PRODUCT</th>
                                <th class="py-4 px-4 text-sm font-semibold text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr class="border-b dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                                    <td class="py-4 px-4 text-sm">{{ $loop->iteration }}</td>
                                    <td class="py-4 px-4 text-sm font-medium">{{ $category->name }}</td>
                                    <td class="py-4 px-4 text-sm text-center">
                                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-indigo-500/20 text-indigo-500 text-xs font-bold border border-indigo-500/20">
                                            {{ $category->products_count }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 text-sm">
                                        <div class="flex justify-center items-center gap-4">
                                            <x-edit-button :url="route('category.edit', $category)" />
                                            <x-delete-button :url="route('category.destroy', $category)" />
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($categories->isEmpty())
                        <div class="py-10 text-center text-gray-500">
                            Tidak ada kategori yang ditemukan.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
