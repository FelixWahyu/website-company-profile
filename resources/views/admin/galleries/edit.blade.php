<x-admin-layout>
    <x-slot name="header">
        Edit Galeri: {{ $gallery->title }}
    </x-slot>

    <div class="bg-white shadow-md rounded-lg p-8 max-w-5xl mx-auto">
        <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')

            @include('admin.galleries._form')

            <!-- Tombol Aksi -->
            <div class="flex items-center gap-4 mt-8">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md">
                    Perbarui Gambar
                </button>
                <a href="{{ route('admin.galleries.index') }}" class="text-gray-600 hover:text-gray-800 font-medium">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
