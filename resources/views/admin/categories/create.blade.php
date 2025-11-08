<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Tambah Kategori Baru</h2>
    </x-slot>

    <div class="container mx-auto px-6 py-2">

        <div class="bg-white rounded-lg p-2">

            <form action="{{ route('admin.categories.store') }}" method="POST">

                @include('admin.categories._form')

                <div class="flex items-center gap-4">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md">
                        Simpan Kategori
                    </button>
                    <a href="{{ route('admin.categories.index') }}"
                        class="text-gray-800 bg-gray-100 border border-gray-300 px-4 py-2 rounded-md hover:bg-gray-200 font-medium">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>
</x-admin-layout>
