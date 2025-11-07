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

        $query = Testimonial::where('is_approved', true);
        $totalReviews = $query->count();
        $averageRating = $query->avg('rating');

        return view('pages.home', compact(
            'promotions',
            'testimonials',
            'totalReviews',
            'averageRating'
        ));
    }
}
