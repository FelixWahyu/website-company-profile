<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactCustomerController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }
}
