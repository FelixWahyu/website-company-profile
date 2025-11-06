<?php

namespace App\Http\Controllers\Admin;

use App\Models\PromoSlide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PromoSlideController extends Controller
{
    public function index()
    {
        $slides = PromoSlide::latest()->paginate(10);
        return view('admin.promo-slides.index', compact('slides'));
    }

    // Method create() - Menampilkan form tambah
    public function create()
    {
        return view('admin.promo-slides.create');
    }

    // Method store() - Menyimpan slide baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'overlay_text' => 'nullable|string|max:50',
            'button_text' => 'required|string|max:100',
            'link' => 'required|url',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['image'] = $request->file('image')->store('promo_slides', 'public');
        $validated['is_active'] = $request->has('is_active');

        PromoSlide::create($validated);

        return redirect()->route('admin.promo-slides.index')->with('success', 'Slide promo berhasil ditambahkan.');
    }

    // Method edit() - Menampilkan form edit
    public function edit(PromoSlide $promoSlide)
    {
        return view('admin.promo-slides.edit', compact('promoSlide'));
    }

    // Method update() - Memperbarui slide
    public function update(Request $request, PromoSlide $promoSlide)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // null jika tidak ganti
            'overlay_text' => 'nullable|string|max:50',
            'button_text' => 'required|string|max:100',
            'link' => 'required|url',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($promoSlide->image) {
                Storage::disk('public')->delete($promoSlide->image);
            }
            $validated['image'] = $request->file('image')->store('promo_slides', 'public');
        }

        $promoSlide->update($validated);

        return redirect()->route('admin.promo-slides.index')->with('success', 'Slide promo berhasil diperbarui.');
    }

    // Method destroy() - Menghapus slide
    public function destroy(PromoSlide $promoSlide)
    {
        if ($promoSlide->image) {
            Storage::disk('public')->delete($promoSlide->image);
        }
        $promoSlide->delete();
        return redirect()->route('admin.promo-slides.index')->with('success', 'Slide promo berhasil dihapus.');
    }
}
