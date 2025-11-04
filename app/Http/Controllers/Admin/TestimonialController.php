<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\TestimonialReply;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with(['user', 'replies.user'])
            ->latest()
            ->paginate(10); // Paginate agar tidak berat

        return view('admin.testimonials.index', compact('testimonials'));
    }

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

    public function approve(Testimonial $testimonial)
    {
        $testimonial->update([
            'is_approved' => !$testimonial->is_approved
        ]);

        $message = $testimonial->is_approved ? 'Ulasan telah disetujui.' : 'Persetujuan ulasan telah dibatalkan.';

        return redirect()->back()->with('success', $message);
    }

    public function reply(Request $request, Testimonial $testimonial)
    {
        // 1. Validasi input
        $request->validate([
            'reply_comment' => 'required|string|min:3',
        ]);

        // 2. Buat balasan baru
        TestimonialReply::create([
            'testimonial_id' => $testimonial->id,
            'user_id' => Auth::id(), // ID admin yang sedang login
            'reply_comment' => $request->reply_comment,
        ]);

        // 3. (Opsional) Setujui otomatis ulasannya jika dibalas
        if (!$testimonial->is_approved) {
            $testimonial->update(['is_approved' => true]);
        }

        return redirect()->back()->with('success', 'Balasan telah terkirim.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('success', 'Testimoni berhasil dihapus.');
    }
}
