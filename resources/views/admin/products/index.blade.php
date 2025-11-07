<x-admin-layout>

    <x-slot name="header">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Manajemen Produk</h2>
    </x-slot>
    <div class="container mx-auto px-6 mb-4">

        <div class="mb-6">
            <a href="{{ route('admin.products.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                + Tambah Produk Baru
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Gambar
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Nama Produk
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Kategori
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Harga
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Promo
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex-shrink-0 w-20 h-20">
                                    <img class="w-full h-full rounded-md object-cover"
                                        src="{{ $product->image ? asset('storage/' . $product->image) : 'https_//via.placeholder.com/150' }}"
                                        alt="{{ $product->name }}" />
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap font-semibold">{{ $product->name }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="bg-gray-200 text-gray-700 text-xs font-medium px-2 py-1 rounded-full">
                                    {{ $product->category->name ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                @if ($product->is_promo && $product->promo_price)
                                    <p class="text-red-600 font-bold whitespace-no-wrap">Rp
                                        {{ number_format($product->promo_price, 0, ',', '.') }}</p>
                                    <p class="text-gray-500 line-through text-xs whitespace-no-wrap">Rp
                                        {{ number_format($product->price, 0, ',', '.') }}</p>
                                @else
                                    <p class="text-gray-900 font-bold whitespace-no-wrap">Rp
                                        {{ number_format($product->price, 0, ',', '.') }}</p>
                                @endif
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                @if ($product->is_promo)
                                    <span
                                        class="inline-block bg-green-200 text-green-800 text-xs font-bold px-3 py-1 rounded-full">
                                        Aktif
                                    </span>
                                @else
                                    <span
                                        class="inline-block bg-gray-200 text-gray-700 text-xs font-bold px-3 py-1 rounded-full">
                                        Tidak
                                    </span>
                                @endif
                            </td>
                            <td
                                class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right whitespace-no-wrap">
                                <a href="{{ route('admin.products.edit', $product) }}"
                                    class="text-indigo-600 hover:text-indigo-900 font-semibold mr-4">
                                    Edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Anda yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                <p class="text-gray-500">Belum ada produk.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
