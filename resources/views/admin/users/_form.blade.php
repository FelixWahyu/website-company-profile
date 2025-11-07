@csrf
<!-- Nama -->
<div class="mb-6">
    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
        Nama User:
    </label>
    <input type="text" id="name" name="name" {{-- 
             Logika ini:
             1. Ambil data 'old' (jika validasi gagal).
             2. Jika tidak ada, ambil data dari $user->name (saat edit).
             3. Jika tidak ada juga, pakai string kosong (saat create).
           --}} value="{{ old('name', $user->name ?? '') }}"
        class="shadow appearance-none border @error('name') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
        required autofocus>

    {{-- Tampilkan error jika validasi 'name' gagal --}}
    @error('name')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
    @enderror
</div>

<!-- Email -->
<div class="mb-6">
    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
        Email:
    </label>
    <input type="email" id="email" name="email" value="{{ old('email', $user->email ?? '') }}"
        class="shadow appearance-none border @error('email') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
        required>
    @error('email')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
    @enderror
</div>

<!-- Role -->
<div class="mb-6">
    <label for="role" class="block text-gray-700 text-sm font-bold mb-2">
        Role:
    </label>
    <select id="role" name="role"
        class="shadow appearance-none border @error('role') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
        required>
        <option value="">Pilih Role...</option>
        <option value="admin" @selected(old('role', $user->role ?? '') == 'admin')>
            Admin
        </option>
        <option value="customer" @selected(old('role', $user->role ?? '') == 'customer')>
            Customer
        </option>
    </select>
    @error('role')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
    @enderror
</div>

<hr class="my-6">

<!-- Password -->
<div class="mb-6">
    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
        Password:
    </label>
    <input type="password" id="password" name="password"
        class="shadow appearance-none border @error('password') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
        {{-- Password hanya 'wajib' saat membuat user baru --}} {{ isset($user) ? '' : 'required' }}>

    {{-- Tampilkan petunjuk ini hanya saat 'edit' --}}
    @if (isset($user))
        <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah password.</p>
    @endif

    @error('password')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
    @enderror
</div>

<!-- Konfirmasi Password -->
<div class="mb-6">
    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">
        Konfirmasi Password:
    </label>
    <input type="password" id="password_confirmation" name="password_confirmation"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
</div>
