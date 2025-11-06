<x-admin-layout>
    <x-slot name="title">
        Tambah Slide Promo Baru
    </x-slot>

    <div class="container mx-auto px-6 py-8">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Tambah Slide Promo Baru</h2>

        <div class="bg-white shadow-md rounded-lg p-8">
            <form action="{{ route('admin.promo-slides.store') }}" method="POST" enctype="multipart/form-data">

                @include('admin.promo-slides._form')

                <div class="flex items-center gap-4 mt-8">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md">
                        Simpan Slide
                    </button>
                    <a href="{{ route('admin.promo-slides.index') }}"
                        class="text-gray-600 hover:text-gray-800 font-medium">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
