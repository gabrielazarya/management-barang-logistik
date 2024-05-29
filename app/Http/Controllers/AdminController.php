<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function informasi()
    {
        return view('view-admin.informasi');
    }
    public function tambah()
    {
        return view('view-admin.tambah');
    }
    public function konfirmasi()
    {
        return view('view-admin.konfirmasi');
    }
    public function riwayat()
    {
        return view('view-admin.riwayat');
    }
    
}
