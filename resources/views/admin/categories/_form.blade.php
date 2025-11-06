@csrf

<div class="mb-6">
    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
        Nama Kategori:
    </label>

    <input type="text" id="name" name="name" {{-- 
          Gunakan data lama (old) jika ada (gagal validasi).
          Jika tidak ada data lama, gunakan data $category->name (saat edit).
          Jika tidak ada keduanya (saat create), gunakan string kosong.
        --}}
        value="{{ old('name', $category->name ?? '') }}"
        class="shadow appearance-none border @error('name') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
        required autofocus>

    @error('name')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
    @enderror
</div>
