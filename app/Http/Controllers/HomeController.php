<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $promotions = Promotion::latest()->get();
        return view('pages.home', compact('promotions'));
    }
}
