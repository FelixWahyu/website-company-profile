<x-admin-layout>
    <x-slot name="title">
        Tambah Kategori Baru
    </x-slot>

    <div class="container mx-auto px-6 py-8">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Tambah Kategori Baru</h2>

        <div class="bg-white shadow-md rounded-lg p-8">

            <form action="{{ route('admin.categories.store') }}" method="POST">

                {{-- Include file form parsial --}}
                @include('admin.categories._form')

                <div class="flex items-center gap-4">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md">
                        Simpan
                    </button>
                    <a href="{{ route('admin.categories.index') }}"
                        class="text-gray-600 hover:text-gray-800 font-medium">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>
</x-admin-layout>
