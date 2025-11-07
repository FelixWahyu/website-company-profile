<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialCustomerController extends Controller
{
    public function index()
    {
        return view('pages.wedding.index');
    }
}
