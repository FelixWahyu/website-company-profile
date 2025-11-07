<x-admin-layout>
    <x-slot name="title">
        Manajemen Slide Promo
    </x-slot>

    <div class="container mx-auto px-6 py-8">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Manajemen Slide Promo</h2>

        <div class="mb-6">
            <a href="{{ route('admin.promo-slides.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                + Tambah Slide Baru
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
                            Judul
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Status
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($slides as $slide)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex-shrink-0 w-32 h-20">
                                    <img class="w-full h-full rounded-md object-cover"
                                        src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}" />
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap font-semibold">{{ $slide->title }}</p>
                                <p class="text-gray-600 whitespace-no-wrap text-xs">{{ $slide->overlay_text }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                @if ($slide->is_active)
                                    <span
                                        class="inline-block bg-green-200 text-green-800 text-xs font-bold px-3 py-1 rounded-full">
                                        Aktif
                                    </span>
                                @else
                                    <span
                                        class="inline-block bg-gray-200 text-gray-700 text-xs font-bold px-3 py-1 rounded-full">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>
                            <td
                                class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right whitespace-no-wrap">
                                <a href="{{ route('admin.promo-slides.edit', $slide) }}"
                                    class="text-indigo-600 hover:text-indigo-900 font-semibold mr-4">
                                    Edit
                                </a>
                                <form action="{{ route('admin.promo-slides.destroy', $slide) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Anda yakin ingin menghapus slide ini?');">
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
                            <td colspan="5" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                <p class="text-gray-500">Belum ada slide promo.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                {{ $slides->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
