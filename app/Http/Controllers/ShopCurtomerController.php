<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\PromoSlide;
use Illuminate\Http\Request;

class ShopCurtomerController extends Controller
{
    public function index(Request $request)
    {
        $promoSlides = PromoSlide::where('is_active', true) // <-- [BARU] Ambil dari tabel baru
            ->latest()
            ->get();
        // 1. Ambil semua kategori untuk tombol filter
        $categories = Category::orderBy('name')->get();

        // 2. Mulai query produk (sudah termasuk Eager Loading 'category')
        $query = Product::query()->with('category');

        // 3. Terapkan filter PENCARIAN jika ada
        if ($request->filled('search')) {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm)
                    ->orWhere('description', 'like', $searchTerm);
            });
        }

        // 4. Terapkan filter KATEGORI jika ada
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // 5. Ambil hasil dengan pagination (misal, 12 produk per halaman)
        // 'withQueryString' penting agar filter tetap aktif saat pindah halaman
        $products = $query->latest()->paginate(12)->withQueryString();

        // 6. Kirim data ke view
        return view('pages.shop.index', compact(
            'promoSlides',
            'products',
            'categories'
        ));
    }
}
