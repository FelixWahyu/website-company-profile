<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $promotions = Promotion::latest()->get();

        $testimonials = Testimonial::where('is_approved', true)
            ->with(['user', 'replies.user']) // Ambil data user & balasan admin
            ->latest()
            ->take(3) // Ambil 3 terbaru
            ->get();

        return view('pages.home', compact('promotions', 'testimonials'));
    }
}
