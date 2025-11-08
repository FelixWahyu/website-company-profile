<x-admin-layout>
    <x-slot name="header">
        Edit Galeri: {{ $gallery->title }}
    </x-slot>

    <div class="bg-white rounded-lg p-4 max-w-5xl mx-auto">
        <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')

            @include('admin.galleries._form')

            <div class="flex items-center px-4 gap-4 mt-8">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md">
                    Perbarui Gambar
                </button>
                <a href="{{ route('admin.galleries.index') }}"
                    class="text-gray-800 bg-gray-100 border border-gray-300 px-4 py-2 rounded-md hover:bg-gray-200 font-medium">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
