<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Menampilkan form untuk membuat kategori baru (CREATE form)
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Menyimpan kategori baru ke database (CREATE logic)
     */
    public function store(Request $request)
    {
        // Validasi: 'name' harus unik di tabel 'categories'
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) // Otomatis buat slug dari nama
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit kategori (UPDATE form)
     */
    public function edit(Category $category)
    {
        // Route-Model Binding akan otomatis mencari Kategori berdasarkan ID
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Memperbarui data kategori di database (UPDATE logic)
     */
    public function update(Request $request, Category $category)
    {
        // Validasi: 'name' harus unik, KECUALI untuk ID kategori ini sendiri
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories')->ignore($category->id)
            ],
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Menghapus kategori dari database (DELETE logic)
     */
    public function destroy(Category $category)
    {
        $category->delete();

        // Catatan: Sesuai migrasi kita (onDelete('set null')),
        // semua produk dalam kategori ini akan otomatis memiliki category_id = null.

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
