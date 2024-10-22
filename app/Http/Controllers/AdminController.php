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
        return view('view-admin.konfirmasi', compact('borrowedItems'));
    }

    public function confirmBorrowing($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $pinjam->update(['status' => 'terima']);

        return redirect()->route('konfirmasi')->with('success', 'Peminjaman dikonfirmasi!');
    }

    public function rejectBorrowing($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $pinjam->update(['status' => 'tolak']);

        return redirect()->route('konfirmasi')->with('error', 'Peminjaman ditolak!');
    }

    public function riwayat()
    {
        $pinjams = Pinjam::with('barang', 'user')->paginate(10);

        return view('view-admin.riwayat', compact('pinjams'));
    }

    public function informasi(Request $request)
    {
        $tanggal_pinjam = $request->input('tanggal_pinjam', date('Y-m-d'));
        $tanggal_pengembalian = $request->input('tanggal_pengembalian', date('Y-m-d'));
    
        $items = DB::table('barangs')
            ->leftJoin('pinjams', function ($join) use ($tanggal_pinjam, $tanggal_pengembalian) {
                $join->on('barangs.id_barang', '=', 'pinjams.id_barang')
                    ->where('pinjams.status', '=', 'terima')
                    ->where(function ($query) use ($tanggal_pinjam, $tanggal_pengembalian) {
                        $query->whereBetween('pinjams.tanggal_pinjam', [$tanggal_pinjam, $tanggal_pengembalian])
                            ->orWhereBetween('pinjams.tanggal_pengembalian', [$tanggal_pinjam, $tanggal_pengembalian])
                            ->orWhere(function ($query) use ($tanggal_pinjam, $tanggal_pengembalian) {
                                $query->where('pinjams.tanggal_pinjam', '<=', $tanggal_pinjam)
                                      ->where('pinjams.tanggal_pengembalian', '>=', $tanggal_pengembalian);
                            });
                    });
            })
            ->select(
                'barangs.id_barang', 
                'barangs.nama_barang', 
                'barangs.tipe_barang', 
                'barangs.jumlah_barang_tersedia', 
                DB::raw('barangs.jumlah_barang_tersedia - COALESCE(SUM(pinjams.jumlah_barang_dipinjam), 0) AS jumlah_tersedia')
            )
            ->groupBy('barangs.id_barang', 'barangs.nama_barang', 'barangs.tipe_barang', 'barangs.jumlah_barang_tersedia')
            ->get();
    
        return view('view-admin.informasi', [
            'items' => $items, 
            'tanggal_pinjam' => $tanggal_pinjam, 
            'tanggal_pengembalian' => $tanggal_pengembalian
        ]);
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

        return redirect()->route('informasi')->with('delete', 'Barang berhasil dihapus.');
    }  

}
