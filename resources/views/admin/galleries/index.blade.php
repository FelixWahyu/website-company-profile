<x-admin-layout>
    <x-slot name="header">
        Galeri
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.galleries.create') }}"
                class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Tambah Gambar</a>
        </div>

        @if (session('success'))
            <div class="px-4 py-2 mb-4 text-sm text-green-700 bg-green-100 border border-green-400 rounded"
                role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @forelse ($galleries as $gallery)
                <div class="relative group">
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $gallery->image_path) }}"
                        alt="{{ $gallery->title }}">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-between p-2 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg">

                        <!-- Info Judul & Kategori -->
                        <div>
                            <p class="text-white text-sm font-bold">{{ $gallery->title }}</p>
                            <span
                                class="text-xs font-semibold uppercase px-2 py-1 bg-indigo-500 text-white rounded-full">{{ $gallery->category }}</span>
                        </div>

                        <!-- [UPDATE] Tombol Aksi (Edit & Hapus) -->
                        <div class="grid grid-cols-2 gap-2">
                            <!-- Tombol Edit -->
                            <a href="{{ route('admin.galleries.edit', $gallery) }}"
                                class="w-full px-2 py-1 text-xs text-white text-center bg-blue-600 rounded hover:bg-blue-700">
                                Edit
                            </a>
                            <!-- Tombol Hapus -->
                            <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin hapus gambar ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full px-2 py-1 text-xs text-white bg-red-600 rounded hover:bg-red-700">Hapus</button>
                            </form>
                        </div>

                    </div>
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-500">Galeri masih kosong.</p>
            @endforelse
        </div>
        <div class="mt-4">
            {{ $galleries->links() }}
        </div>
    </div>
</x-admin-layout>
