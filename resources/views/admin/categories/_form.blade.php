@csrf

<div class="mb-6">
    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
        Nama Kategori:
    </label>

    <input type="text" id="name" name="name" value="{{ old('name', $category->name ?? '') }}"
        class="shadow-md appearance-none border @error('name') border-red-500 @enderror rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
        required autofocus>

    @error('name')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
    @enderror
</div>
