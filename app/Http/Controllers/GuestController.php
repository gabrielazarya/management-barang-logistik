<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index() {
        return view('view-guest.page.dashboard');
    }

    public function tentang() {
        return view('view-guest.page.tentang');
    }
}
