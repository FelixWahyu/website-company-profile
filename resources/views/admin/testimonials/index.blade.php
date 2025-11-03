<x-admin-layout>
    <x-slot name="header">Manajemen Testimoni</x-slot>
    <div class="p-6 bg-white border-b border-gray-200">
        @if (session('success'))
            <div class="px-4 py-2 mb-4 text-sm text-green-700 bg-green-100 border border-green-400 rounded"
                role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="space-y-4">
            @forelse($testimonials as $testimonial)
                <div
                    class="p-4 border rounded-lg {{ !$testimonial->is_approved ? 'bg-yellow-50 border-yellow-200' : '' }}">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-semibold">{{ $testimonial->user->name }}</p>
                            <p class="text-sm text-gray-600">{{ $testimonial->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <form action="{{ route('admin.testimonials.approve', $testimonial) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="px-3 py-1 text-xs font-medium text-white {{ $testimonial->is_approved ? 'bg-gray-500 hover:bg-gray-600' : 'bg-green-500 hover:bg-green-600' }} rounded">
                                    {{ $testimonial->is_approved ? 'Batal Setujui' : 'Setujui' }}
                                </button>
                            </form>
                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin hapus testimoni ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 text-xs font-medium text-white bg-red-500 hover:bg-red-600 rounded">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <p class="mt-2 text-gray-800">"{{ $testimonial->comment }}"</p>
                </div>
            @empty
                <p class="text-center text-gray-500">Belum ada testimoni dari pelanggan.</p>
            @endforelse
        </div>
        <div class="mt-4">{{ $testimonials->links() }}</div>
    </div>
</x-admin-layout>
