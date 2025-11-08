{{-- Asumsi Anda menggunakan layout admin yang sudah ada, misal: x-admin-layout --}}
<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Manajemen Testimonials</h2>
    </x-slot>

    <div class="container mx-auto mb-4 bg-white shadow-md rounded-lg overflow-hidden">

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="p-6">
            @if ($testimonials->isEmpty())
                <p class="text-gray-500 text-center">Belum ada testimonial yang masuk.</p>
            @else
                <div class="space-y-8">
                    @foreach ($testimonials as $testimonial)
                        <div
                            class="border rounded-lg p-6 {{ !$testimonial->is_approved ? 'border-yellow-400 bg-yellow-50' : 'border-gray-200' }}">

                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <p class="font-bold text-lg text-gray-900">{{ $testimonial->user->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $testimonial->user->email }}</p>
                                    <p class="text-sm text-gray-500">
                                        {{ $testimonial->created_at->format('d M Y, H:i') }}</p>
                                </div>
                                <div class="flex items-center">
                                    <span
                                        class="text-yellow-500 font-bold text-lg mr-1">{{ $testimonial->rating }}</span>
                                    <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 7.09l6.572-.955L10 0l2.939 6.135 6.572.955-4.756 4.455 1.123 6.545z" />
                                    </svg>
                                </div>
                            </div>

                            <p class="text-gray-700 italic mb-4">"{{ $testimonial->comment }}"</p>

                            <form action="{{ route('admin.testimonials.approve', $testimonial) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('PATCH')
                                @if ($testimonial->is_approved)
                                    <button type="submit"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold py-2 px-4 rounded-lg">
                                        Batal Setujui (Unapprove)
                                    </button>
                                @else
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-600 text-white text-sm font-semibold py-2 px-4 rounded-lg">
                                        Setujui (Approve)
                                    </button>
                                @endif
                            </form>

                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST"
                                class="inline-block"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus ulasan ini? Tindakan ini tidak bisa dibatalkan.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold py-2 px-4 rounded-lg ml-2">
                                    Hapus
                                </button>
                            </form>

                            <hr class="my-6">

                            @if ($testimonial->replies->isNotEmpty())
                                <h4 class="font-semibold text-gray-800 mb-2">Balasan Admin:</h4>
                                @foreach ($testimonial->replies as $reply)
                                    <div class="bg-indigo-50 p-4 rounded-lg mb-2">
                                        <p class="text-sm text-gray-700">{{ $reply->reply_comment }}</p>
                                        <p class="text-xs text-gray-500 mt-1">Oleh: {{ $reply->user->name }}</p>
                                    </div>
                                @endforeach
                            @endif

                            <form action="{{ route('admin.testimonials.reply', $testimonial) }}" method="POST"
                                class="mt-4">
                                @csrf
                                <label for="reply_comment_{{ $testimonial->id }}"
                                    class="block text-sm font-medium text-gray-700">Tulis Balasan:</label>
                                <textarea id="reply_comment_{{ $testimonial->id }}" name="reply_comment" rows="2"
                                    class="mt-1 shadow-sm block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="Balasan Anda..."></textarea>
                                @error('reply_comment')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                                <button type="submit"
                                    class="mt-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded-lg">
                                    Kirim Balasan
                                </button>
                            </form>

                        </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $testimonials->links() }}
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
