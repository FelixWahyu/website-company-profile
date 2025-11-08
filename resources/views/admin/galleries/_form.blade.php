@csrf
<div class="p-4">
    <div class="mb-6">
        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
            Judul Gambar:
        </label>
        <input type="text" id="title" name="title" value="{{ old('title', $gallery->title ?? '') }}"
            class="shadow-md appearance-none border @error('title') border-red-500 @enderror rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
            required autofocus>
        @error('title')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="category" class="block text-gray-700 text-sm font-bold mb-2">
            Kategori:
        </label>
        <select id="category" name="category"
            class="shadow-md appearance-none border @error('category') border-red-500 @enderror rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
            required>
            <option value="">Pilih Kategori...</option>
            <option value="supermarket" @selected(old('category', $gallery->category ?? '') == 'supermarket')>
                Supermarket
            </option>
            <option value="wedding" @selected(old('category', $gallery->category ?? '') == 'wedding')>
                Wedding
            </option>
        </select>
        @error('category')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">
            File Gambar:
        </label>
        <input type="file" id="image" name="image"
            class="mt-1 block border border-gray-500 p-1 rounded-lg shadow-md w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
            accept="image/*" {{ isset($gallery) ? '' : 'required' }}>
        @if (isset($gallery))
            <span class="text-xs text-gray-500">Kosongkan jika tidak ingin mengganti gambar.</span>
        @endif
        @error('image')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror

        @if (isset($gallery) && $gallery->image_path)
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-500">Gambar Saat Ini:</label>
                <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}"
                    class="w-full h-auto max-w-sm mt-2 rounded-lg shadow-md">
            </div>
        @endif
    </div>
</div>
