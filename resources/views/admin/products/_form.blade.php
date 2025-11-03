@csrf
<div class="space-y-4">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}"
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
        @error('name')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
        <input type="number" name="price" id="price" value="{{ old('price', $product->price ?? '') }}"
            placeholder="Contoh: 50000" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
        @error('price')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea name="description" id="description" rows="4"
            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>{{ old('description', $product->description ?? '') }}</textarea>
        @error('description')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="image" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
        <input type="file" name="image" id="image"
            class="block w-full mt-1 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
        @if (isset($product) && $product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="mt-2 h-20 rounded">
        @endif
        @error('image')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
        {{ $submitText ?? 'Simpan' }}
    </button>
    <a href="{{ route('admin.products.index') }}"
        class="px-4 py-2 text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50">
        Batal
    </a>
</div>
