@csrf
<div class="space-y-4 p-4">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nama Paket</label>
        <input type="text" name="name" id="name" value="{{ old('name', $weddingPackage->name ?? '') }}"
            class="block w-full mt-1 border-gray-500 rounded-lg shadow-md" required>
    </div>
    <div>
        <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
        <input type="number" name="price" id="price" value="{{ old('price', $weddingPackage->price ?? '') }}"
            class="block w-full mt-1 border-gray-500 rounded-lg shadow-md" required>
    </div>
    <div>
        <label for="features" class="block text-sm font-medium text-gray-700">Fitur Paket (satu fitur per baris)</label>
        <textarea name="features" id="features" rows="5" class="block w-full mt-1 border-gray-500 rounded-lg shadow-md"
            required>{{ old('features', isset($weddingPackage) && is_array($weddingPackage->features) ? implode("\n", $weddingPackage->features) : '') }}</textarea>
    </div>
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea name="description" id="description" rows="4"
            class="block w-full mt-1 border-gray-500 rounded-lg shadow-md" required>{{ old('description', $weddingPackage->description ?? '') }}</textarea>
    </div>
    <div>
        <label for="image" class="block text-sm font-medium text-gray-700">Gambar Paket</label>
        <input type="file" name="image" id="image"
            class="block w-full mt-1 text-sm border border-gray-500 p-1 shadow-md rounded-lg text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
        @if (isset($weddingPackage) && $weddingPackage->image)
            <img src="{{ asset('storage/' . $weddingPackage->image) }}" class="mt-2 h-20 rounded">
        @endif
    </div>
</div>
<div class="flex items-center gap-4 mt-6 px-4">
    <button type="submit"
        class="px-4 py-2 text-white bg-blue-600 rounded-md shadow-md hover:bg-blue-700">{{ $submitText ?? 'Simpan' }}</button>
    <a href="{{ route('admin.wedding-packages.index') }}"
        class="px-4 py-2 bg-gray-100 text-gray-800 border border-gray-300 rounded-md hover:bg-gray-200">Batal</a>
</div>
