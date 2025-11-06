@csrf
<div x-data="{ isPromo: {{ old('is_promo', $product->is_promo ?? false) ? 'true' : 'false' }} }">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="md:col-span-2 space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="description" name="description" rows="6" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $product->description ?? '') }}</textarea>
                @error('description')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Harga Normal (Rp)</label>
                    <input type="number" id="price" name="price" step="0.01"
                        value="{{ old('price', $product->price ?? '') }}" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('price')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="pt-6">
                    <label for="is_promo" class="flex items-center">
                        <input type="checkbox" id="is_promo" name="is_promo" value="1"
                            @checked(old('is_promo', $product->is_promo ?? false)) x-model="isPromo"
                            class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <span class="ml-3 text-sm font-medium text-gray-700">Aktifkan Promo</span>
                    </label>
                </div>
            </div>

            <div x-show="isPromo" x-transition>
                <label for="promo_price" class="block text-sm font-medium text-gray-700">Harga Promo (Rp)</label>
                <input type="number" id="promo_price" name="promo_price" step="0.01"
                    value="{{ old('promo_price', $product->promo_price ?? '') }}" :required="isPromo"
                    {{-- Wajib diisi jika promo aktif --}}
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Harga harus lebih rendah dari harga normal">
                @error('promo_price')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="space-y-6">
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select id="category_id" name="category_id" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Pilih Kategori...</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
                <input type="file" id="image" name="image"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                    accept="image/*">
                @error('image')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

                @if (isset($product) && $product->image)
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-500">Gambar Saat Ini:</label>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="w-full h-auto max-w-xs mt-2 rounded-md shadow-md">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
