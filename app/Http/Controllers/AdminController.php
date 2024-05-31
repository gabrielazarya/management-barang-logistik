<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pinjam;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function tambah()
    {
        $barangs = Barang::all();
        return view('view-admin.tambah', compact('barangs'));
    }
    
    public function konfirmasi()
    {

        $borrowedItems = Pinjam::where('status', 'pending')->with('barang', 'user')->get();

        return view('view-admin.konfirmasi', ['borrowedItems' => $borrowedItems]);
    }

    public function confirmBorrowing($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $pinjam->status = 'confirmed'; 
        $pinjam->save();

        return redirect()->route('konfirmasi')->with('success', 'Peminjaman berhasil dikonfirmasi');
    }

    public function rejectBorrowing($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $pinjam->status = 'rejected'; 
        $pinjam->save();

        return redirect()->route('konfirmasi')->with('error', 'Peminjaman ditolak');
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
            'jumlah_barang_tersedia' => 'required|integer|min:0',
        ]);

        Barang::create($request->all());

        return redirect()->route('informasi')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function editData($id)
    {
        $barang = Barang::findOrFail($id);
        return view('view-admin.edit', compact('barang'));
    }

    public function updateData(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'tipe_barang' => 'required|string|max:255',
            'jumlah_barang_tersedia' => 'required|integer|min:0',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('informasi')->with('success', 'Barang berhasil diperbarui.');
    }

    public function deleteData($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('informasi')->with('success', 'Barang berhasil dihapus.');
    }
}
