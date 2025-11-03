<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        // Ambil semua setting dan ubah menjadi array asosiatif [key => value]
        $settings = Setting::pluck('value', 'key')->all();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);

        // Handle upload logo
        if ($request->hasFile('site_logo')) {
            // Cari path logo lama
            $oldLogo = Setting::where('key', 'site_logo')->first();

            // Hapus logo lama dari storage jika ada
            if ($oldLogo && $oldLogo->value) {
                Storage::disk('public')->delete($oldLogo->value);
            }

            // Simpan logo baru dan dapatkan path-nya
            $path = $request->file('site_logo')->store('logos', 'public');

            // Simpan path baru ke database
            Setting::updateOrCreate(['key' => 'site_logo'], ['value' => $path]);
        }

        // Simpan semua data lain selain token dan file logo
        $data = $request->except(['_token', 'site_logo']);
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return back()->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
