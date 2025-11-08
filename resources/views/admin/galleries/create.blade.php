<x-admin-layout>
    <x-slot name="header">
        Tambah Galeri Baru
    </x-slot>

    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.galleries._form')
        <div class="flex items-center px-4 gap-4 mt-6">
            <button type="submit" class="px-4 py-2 shadow-md text-white bg-blue-600 rounded-md hover:bg-blue-700">Upload
                Gambar</button>
            <a href="{{ route('admin.galleries.index') }}"
                class="px-4 py-2 bg-gray-100 text-gray-800 border border-gray-300 rounded-md hover:bg-gray-200">Batal</a>
        </div>
    </form>
</x-admin-layout>
