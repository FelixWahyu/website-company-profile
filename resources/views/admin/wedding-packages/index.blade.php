<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Manajemen Paket</h2>
    </x-slot>
    <div class="p-2 bg-white">
        <div class="flex justify-start mb-4">
            <a href="{{ route('admin.wedding-packages.create') }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-lg font-bold shadow-md hover:bg-blue-700">+ Tambah
                Paket</a>
        </div>
        @if (session('success'))
            <div class="px-4 py-2 mb-4 text-sm text-green-700 bg-green-100 border border-green-400 rounded"
                role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-xs font-seminbold tracking-wider text-left text-gray-600 uppercase">
                            Nama
                            Paket</th>
                        <th class="px-6 py-3 text-xs font-seminbold tracking-wider text-left text-gray-600 uppercase">
                            Harga
                        </th>
                        <th class="px-6 py-3 text-xs font-seminbold tracking-wider text-left text-gray-600 uppercase">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($packages as $package)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $package->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ 'Rp ' . number_format($package->price, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                <a href="{{ route('admin.wedding-packages.edit', $package) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('admin.wedding-packages.destroy', $package) }}" method="POST"
                                    class="inline-block ml-4" onsubmit="return confirm('Yakin ingin hapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-sm text-center text-gray-500">Belum ada paket.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $packages->links() }}</div>
    </div>
</x-admin-layout>
