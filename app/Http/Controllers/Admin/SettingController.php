<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        // Ambil semua setting dan ubah menjadi array asosiatif [key => value]
        $settings = Setting::pluck('value', 'key')->all();
        // $settings = Setting::all()->keyBy('key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
            'site_name' => 'nullable|string|max:255',
            'contact_whatsapp' => 'nullable|string|max:20',
            'contact_address' => 'nullable|string',
            'social_instagram' => 'nullable|url', // 'url' akan memvalidasi format link
            'social_facebook' => 'nullable|url',
            'social_tiktok' => 'nullable|url',
        ]);

        $data = $request->except(['_token', 'site_logo']);

        foreach ($data as $key => $value) {
            // value bisa jadi null jika user mengosongkan field, dan itu tidak masalah
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

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

        // Jika tidak ada file logo yang di-upload, blok 'if' ini dilewati,
        // dan logo lama Anda di database akan tetap aman (tidak akan tertimpa null).
        Cache::forget('settings');

        return back()->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
