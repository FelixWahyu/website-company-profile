<?php

namespace App\Http\Controllers\Admin;

use Rules\Password;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        // 1. Ambil semua data user dari database, urutkan dari yang terbaru
        $users = User::latest()->paginate(15); // paginate() untuk membagi per halaman

        // 2. Tampilkan file view dan kirim data 'users' ke dalamnya
        return view('admin.users.index', compact('users'));
    }

    /**
     * TAMPILKAN FORM TAMBAH USER (CREATE - Form)
     * Ini dipanggil oleh: GET /admin/users/create
     */
    public function create()
    {
        // 1. Hanya tampilkan file view yang berisi form kosong
        return view('admin.users.create');
    }

    /**
     * SIMPAN USER BARU KE DATABASE (CREATE - Logic)
     * Ini dipanggil oleh: POST /admin/users
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang dikirim dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // 'unique' = email ini tidak boleh ada di tabel users
            'role' => 'required|string|in:admin,customer', // Hanya boleh 'admin' atau 'customer'
            'password' => ['required', 'confirmed', Rules\Password::defaults()], // 'confirmed' = harus cocok dengan field 'password_confirmation'
        ]);

        // 2. Jika validasi lolos, buat user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password), // 'Hash::make' untuk mengenkripsi password
        ]);

        // 3. Kembalikan admin ke halaman daftar (index) dengan pesan sukses
        return redirect()->route('admin.users.index')->with('success', 'User baru berhasil ditambahkan.');
    }

    /**
     * TAMPILKAN FORM EDIT USER (UPDATE - Form)
     * Ini dipanggil oleh: GET /admin/users/{user}/edit
     */
    public function edit(User $user)
    {
        // 'User $user' (Route Model Binding) adalah fitur canggih Laravel.
        // Laravel otomatis mencari user di database berdasarkan ID di URL.
        // 1. Tampilkan view form edit, dan kirim data 'user' yang mau diedit
        return view('admin.users.edit', compact('user'));
    }

    /**
     * SIMPAN PERUBAHAN USER KE DATABASE (UPDATE - Logic)
     * Ini dipanggil oleh: PATCH /admin/users/{user}
     */
    public function update(Request $request, User $user)
    {
        // 1. Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id) // Email harus unik, KECUALI untuk user ini
            ],
            'role' => 'required|string|in:admin,customer',
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()], // 'nullable' = boleh dikosongi
        ]);

        // 2. Siapkan data yang akan di-update
        $dataToUpdate = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
        ];

        // 3. Cek apakah admin mengisi password baru?
        if (!empty($validated['password'])) {
            // Jika diisi, enkripsi dan tambahkan ke data
            $dataToUpdate['password'] = Hash::make($validated['password']);
        }
        // Jika tidak diisi, password lama tidak akan berubah

        // 4. Update data user di database
        $user->update($dataToUpdate);

        // 5. Kembalikan ke halaman daftar (index) dengan pesan sukses
        return redirect()->route('admin.users.index')->with('success', 'Data user berhasil diperbarui.');
    }

    /**
     * HAPUS USER DARI DATABASE (DELETE)
     * Ini dipanggil oleh: DELETE /admin/users/{user}
     */
    public function destroy(User $user)
    {
        // [FITUR KEAMANAN PENTING]
        // 1. Cek apakah user yang mau dihapus adalah user yang sedang login
        if (Auth::id() === $user->id) {
            // Jika ya, jangan dihapus! Kembalikan dengan pesan error.
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        // 2. Jika bukan, hapus user
        $user->delete();

        // 3. Kembalikan ke halaman daftar (index) dengan pesan sukses
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}
