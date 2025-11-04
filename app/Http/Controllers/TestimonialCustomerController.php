<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialCustomerController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10',
        ]);

        // 2. Cek apakah user ini sudah pernah memberi ulasan
        // (Opsional, tapi bagus untuk mencegah spam)
        $existingTestimonial = Testimonial::where('user_id', Auth::id())->first();

        if ($existingTestimonial) {
            // Jika sudah ada, update ulasan lamanya
            $existingTestimonial->update([
                'rating' => $request->rating,
                'comment' => $request->comment,
                'is_approved' => false, // Setel ulang ke 'belum disetujui'
            ]);
        } else {
            // Jika belum ada, buat ulasan baru
            Testimonial::create([
                'user_id' => Auth::id(), // Ambil ID user yang sedang login
                'rating' => $request->rating,
                'comment' => $request->comment,
                'is_approved' => false, // Default: belum disetujui
            ]);
        }

        // 3. Redirect kembali ke halaman home dengan pesan sukses
        return redirect()->route('home')
            ->with('testimonial_success', 'Ulasan Anda telah terkirim dan akan menunggu persetujuan admin.');
    }
}
