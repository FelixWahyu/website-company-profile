@csrf
<div class="space-y-4">
    <div><label for="title" class="block text-sm font-medium text-gray-700">Judul Promosi</label><input type="text"
            name="title" id="title" value="{{ old('title', $promotion->title ?? '') }}"
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required></div>
    <div><label for="link" class="block text-sm font-medium text-gray-700">URL Link (Opsional)</label><input
            type="url" name="link" id="link" value="{{ old('link', $promotion->link ?? '') }}"
            placeholder="https://example.com" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"></div>
    <div><label for="image" class="block text-sm font-medium text-gray-700">Gambar Slide</label><input type="file"
            name="image" id="image"
            class="block w-full mt-1 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
        @if (isset($promotion) && $promotion->image)
            <img src="{{ asset('storage/' . $promotion->image) }}" class="mt-2 h-20 rounded">
        @endif
    </div>
</div>
<div class="mt-6"><button type="submit"
        class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">{{ $submitText ?? 'Simpan' }}</button><a
        href="{{ route('admin.promotions.index') }}"
        class="px-4 py-2 text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50">Batal</a></div>
