@csrf
<div class="mb-6">
    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
        Nama User:
    </label>
    <input type="text" id="name" name="name" value="{{ old('name', $user->name ?? '') }}"
        class="shadow-md appearance-none border @error('name') border-red-500 @enderror rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
        required autofocus>

    @error('name')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
        Email:
    </label>
    <input type="email" id="email" name="email" value="{{ old('email', $user->email ?? '') }}"
        class="shadow-md appearance-none border @error('email') border-red-500 @enderror rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
        required>
    @error('email')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="role" class="block text-gray-700 text-sm font-bold mb-2">
        Role:
    </label>
    <select id="role" name="role"
        class="shadow-md appearance-none border @error('role') border-red-500 @enderror rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
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

<div class="mb-6">
    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
        Password:
    </label>
    <input type="password" id="password" name="password"
        class="shadow-md appearance-none border @error('password') border-red-500 @enderror rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
        {{ isset($user) ? '' : 'required' }}>

    @if (isset($user))
        <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah password.</p>
    @endif

    @error('password')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">
        Konfirmasi Password:
    </label>
    <input type="password" id="password_confirmation" name="password_confirmation"
        class="shadow-md appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
</div>
