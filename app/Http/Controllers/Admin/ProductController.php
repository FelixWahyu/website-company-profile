<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category; // [BARU] Import model Category
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule; // [BARU] Import untuk validasi unique

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // [UPDATE] Tambahkan 'with' (Eager Loading) untuk mengambil relasi 'category'
        // Ini akan mencegah N+1 query problem di halaman index Anda
        $products = Product::with('category')->latest()->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // [BARU] Ambil semua kategori untuk dikirim ke view (untuk dropdown)
        $categories = Category::orderBy('name')->get();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // [UPDATE] Perbarui validasi
        $request->validate([
            'name' => 'required|string|max:255|unique:products', // [UPDATE] Pastikan nama unik
            'category_id' => 'required|exists:categories,id', // [BARU] Validasi kategori
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_promo' => 'nullable|boolean', // [BARU]
            'promo_price' => 'nullable|numeric|min:0|lt:price', // [BARU] Harga promo harus < harga normal
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // [UPDATE] Sesuaikan data yang disimpan
        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'category_id' => $request->category_id, // [BARU]
            'is_promo' => $request->has('is_promo'), // [BARU] Cek apakah checkbox dicentang
            'promo_price' => $request->has('is_promo') ? $request->promo_price : null, // [BARU]
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // [BARU] Kirim juga data kategori untuk dropdown di halaman edit
        $categories = Category::orderBy('name')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // [UPDATE] Perbarui validasi
        $request->validate([
            'name' => [ // [UPDATE] Validasi unik yang lebih canggih
                'required',
                'string',
                'max:255',
                Rule::unique('products')->ignore($product->id) // Unik, KECUALI untuk ID produk ini
            ],
            'category_id' => 'required|exists:categories,id', // [BARU]
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_promo' => 'nullable|boolean', // [BARU]
            'promo_price' => 'nullable|numeric|min:0|lt:price', // [BARU]
        ]);

        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // [UPDATE] Sesuaikan data yang diperbarui
        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'category_id' => $request->category_id, // [BARU]
            'is_promo' => $request->has('is_promo'), // [BARU]
            'promo_price' => $request->has('is_promo') ? $request->promo_price : null, // [BARU]
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Kode ini sudah benar, tidak perlu diubah.
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'ProduK berhasil dihapus.');
    }
}
