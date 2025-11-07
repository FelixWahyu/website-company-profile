<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:supermarket,wedding',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('galleries', 'public');

        Gallery::create([
            'title' => $request->title,
            'category' => $request->category,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gambar berhasil ditambahkan ke galeri.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:supermarket,wedding',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image_path);
        $gallery->delete();

        return back()->with('success', 'Gambar berhasil dihapus dari galeri.');
    }
}
