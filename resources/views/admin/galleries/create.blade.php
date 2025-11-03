<x-admin-layout>
    <x-slot name="header">
        Tambah Gambar Baru ke Galeri
    </x-slot>

    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-4">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Gambar</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                @error('title')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="category" id="category" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                    required>
                    <option value="">Pilih Kategori</option>
                    <option value="supermarket" {{ old('category') == 'supermarket' ? 'selected' : '' }}>Supermarket
                    </option>
                    <option value="wedding" {{ old('category') == 'wedding' ? 'selected' : '' }}>Wedding</option>
                </select>
                @error('category')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">File Gambar</label>
                <input type="file" name="image" id="image"
                    class="block w-full mt-1 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                    required>
                @error('image')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mt-6">
            <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Upload
                Gambar</button>
            <a href="{{ route('admin.galleries.index') }}"
                class="px-4 py-2 text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50">Batal</a>
        </div>
    </form>
</x-admin-layout>
