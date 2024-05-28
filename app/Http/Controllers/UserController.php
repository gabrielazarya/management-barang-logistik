<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function keTampil()
    {
        return redirect()->route('tampil');
    }
    public function ketersediaan()
    {
        return view('view-user.ketersediaan');
    }

    
}
