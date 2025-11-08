<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Manajemen User</h2>
    </x-slot>

    <div class="container mx-auto px-6 py-2">

        <div class="mb-6">
            <a href="{{ route('admin.users.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                + Tambah User Baru
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Nama
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Email
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Role
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Bergabung
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap font-semibold">{{ $user->name }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-600 whitespace-no-wrap">{{ $user->email }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span
                                    class="capitalize px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $user->role == 'admin' ? 'bg-indigo-200 text-indigo-800' : 'bg-gray-200 text-gray-700' }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-600 whitespace-no-wrap">{{ $user->created_at->format('d M Y') }}</p>
                            </td>
                            <td
                                class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right whitespace-no-wrap">
                                <a href="{{ route('admin.users.edit', $user) }}"
                                    class="text-indigo-600 hover:text-indigo-900 font-semibold mr-4">
                                    Edit
                                </a>


                                @if (Auth::id() === $user->id)
                                    <span class="text-gray-400 font-semibold cursor-not-allowed"
                                        title="Anda tidak dapat menghapus akun sendiri">Hapus</span>
                                @else
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Anda yakin ingin menghapus user ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">
                                            Hapus
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                <p class="text-gray-500">Belum ada user.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
