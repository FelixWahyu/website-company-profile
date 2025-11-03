<x-admin-layout>
    <x-slot name="header">
        Daftar Produk Supermarket
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.products.create') }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Tambah Produk</a>
        </div>

        @if (session('success'))
            <div class="px-4 py-2 mb-4 text-sm text-green-700 bg-green-100 border border-green-400 rounded"
                role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Gambar</th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Nama
                            Produk</th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Harga</th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($products as $product)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/150' }}"
                                    alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                <a href="{{ route('admin.products.edit', $product) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                    class="inline-block ml-4"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-sm text-center text-gray-500">
                                Belum ada produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
</x-admin-layout>
