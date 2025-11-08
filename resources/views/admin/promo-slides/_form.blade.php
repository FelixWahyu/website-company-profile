@csrf
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">

    <div class="md:col-span-2 space-y-6">
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Judul Promo</label>
            <input type="text" id="title" name="title" value="{{ old('title', $promoSlide->title ?? '') }}"
                required
                class="mt-1 block w-full border border-gray-500 rounded-lg shadow-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Misal: Promo Buah Segar">
            @error('title')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
            <textarea id="description" name="description" rows="4" required
                class="mt-1 block w-full border border-gray-500 rounded-lg shadow-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Misal: Diskon hingga 50% untuk semua buah-buahan pilihan">{{ old('description', $promoSlide->description ?? '') }}</textarea>
            @error('description')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label for="button_text" class="block text-sm font-medium text-gray-700">Teks Tombol</label>
                <input type="text" id="button_text" name="button_text"
                    value="{{ old('button_text', $promoSlide->button_text ?? '') }}" required
                    class="mt-1 block w-full border border-gray-500 rounded-lg shadow-md focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Misal: Belanja Sekarang">
                @error('button_text')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="link" class="block text-sm font-medium text-gray-700">URL Link Tujuan</label>
                <input type="url" id="link" name="link" value="{{ old('link', $promoSlide->link ?? '') }}"
                    required
                    class="mt-1 block w-full border border-gray-500 rounded-lg shadow-md focus:ring-blue-500 focus:border-blue-500"
                    placeholder="https://... atau /supermarket?category=buah">
                @error('link')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="space-y-6">
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Gambar Slide (Wajib)</label>
            <input type="file" id="image" name="image"
                class="mt-1 block w-full text-sm p-1 text-gray-500 border border-gray-500 rounded-lg shadow-md file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                accept="image/*" {{ isset($promoSlide) ? '' : 'required' }}>
            <span class="text-xs text-gray-500">Kosongkan jika tidak ingin mengganti gambar (saat edit).</span>
            @error('image')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror

            @if (isset($promoSlide) && $promoSlide->image)
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-500">Gambar Saat Ini:</label>
                    <img src="{{ asset('storage/' . $promoSlide->image) }}" alt="{{ $promoSlide->title }}"
                        class="w-full h-auto max-w-xs mt-2 rounded-md shadow-md">
                </div>
            @endif
        </div>

        <div>
            <label for="overlay_text" class="block text-sm font-medium text-gray-700">Teks Overlay (Opsional)</label>
            <input type="text" id="overlay_text" name="overlay_text"
                value="{{ old('overlay_text', $promoSlide->overlay_text ?? '') }}"
                class="mt-1 block w-full border border-gray-500 rounded-lg shadow-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Misal: 50% OFF atau Beli 2 Gratis 1">
            @error('overlay_text')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="pt-6">
            <label for="is_active" class="flex items-center">
                <input type="checkbox" id="is_active" name="is_active" value="1" @checked(old('is_active', $promoSlide->is_active ?? true))
                    class="h-5 w-5 text-blue-600 border-gray-500 rounded-md focus:ring-blue-500">
                <span class="ml-3 text-sm font-medium text-gray-700">Aktifkan Slide Promo Ini</span>
            </label>
        </div>
    </div>
</div>
