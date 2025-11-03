<?php

namespace App\Http\Controllers\Admin;

use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::latest()->paginate(10);
        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('admin.promotions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'nullable|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('promotions', 'public');

        Promotion::create([
            'title' => $request->title,
            'link' => $request->link,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.promotions.index')
            ->with('success', 'Slide promosi berhasil ditambahkan.');
    }

    public function edit(Promotion $promotion)
    {
        return view('admin.promotions.edit', compact('promotion'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $promotion->image;
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($promotion->image);
            $imagePath = $request->file('image')->store('promotions', 'public');
        }

        $promotion->update([
            'title' => $request->title,
            'link' => $request->link,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.promotions.index')
            ->with('success', 'Slide promosi berhasil diperbarui.');
    }

    public function destroy(Promotion $promotion)
    {
        Storage::disk('public')->delete($promotion->image);
        $promotion->delete();

        return redirect()->route('admin.promotions.index')
            ->with('success', 'Slide promosi berhasil dihapus.');
    }
}
