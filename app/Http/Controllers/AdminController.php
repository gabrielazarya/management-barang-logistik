<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class AdminController extends Controller
{
    
    public function tambah()
    {
        $barangs = Barang::all();
        return view('view-admin.tambah', compact('barangs'));
    }
    public function konfirmasi()
    {
        return view('view-admin.konfirmasi');
    }
    public function riwayat()
    {
        return view('view-admin.riwayat');
    }

    public function informasi()
    {
        $barangs = Barang::all();
        return view('view-admin.informasi', compact('barangs'));
    }
    
    public function tambahData(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'tipe_barang' => 'required|string|max:255',
            'jumlah_barang_tersedia' => 'required|integer',
        ]);

        Barang::create($request->all());

        return redirect()->route('admin.informasi')->with('success', 'Barang berhasil ditambahkan.');
    }
}
