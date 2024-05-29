<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ketersediaan()
    {
        return view('view-user.ketersediaan');
    }
    public function pinjam()
    {
        return view('view-user.pinjam');
    }
    public function riwayat()
    {
        return view('view-user.riwayat');
    }

    
}
