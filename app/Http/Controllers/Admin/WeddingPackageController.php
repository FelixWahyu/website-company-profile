<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\WeddingPackage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WeddingPackageController extends Controller
{
    public function index()
    {
        $packages = WeddingPackage::latest()->paginate(10);
        return view('admin.wedding-packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.wedding-packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'features' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('wedding-packages', 'public');
        }

        // Mengubah string fitur (satu per baris) menjadi array
        $features = explode("\n", str_replace("\r", "", $request->features));

        WeddingPackage::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'features' => $features,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.wedding-packages.index')
            ->with('success', 'Paket Wedding berhasil ditambahkan.');
    }

    public function edit(WeddingPackage $weddingPackage)
    {
        return view('admin.wedding-packages.edit', compact('weddingPackage'));
    }

    public function update(Request $request, WeddingPackage $weddingPackage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'features' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $weddingPackage->image;
        if ($request->hasFile('image')) {
            if ($weddingPackage->image) {
                Storage::disk('public')->delete($weddingPackage->image);
            }
            $imagePath = $request->file('image')->store('wedding-packages', 'public');
        }

        $features = explode("\n", str_replace("\r", "", $request->features));

        $weddingPackage->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'features' => $features,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.wedding-packages.index')
            ->with('success', 'Paket Wedding berhasil diperbarui.');
    }

    public function destroy(WeddingPackage $weddingPackage)
    {
        if ($weddingPackage->image) {
            Storage::disk('public')->delete($weddingPackage->image);
        }
        $weddingPackage->delete();

        return redirect()->route('admin.wedding-packages.index')
            ->with('success', 'Paket Wedding berhasil dihapus.');
    }
}
