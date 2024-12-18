<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pinjam;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class UserController extends Controller
{
    public function ketersediaan(Request $request)
    {
        $tanggal_pinjam = $request->input('tanggal_pinjam', date('Y-m-d'));
        $tanggal_pengembalian = $request->input('tanggal_pengembalian', date('Y-m-d'));

        $availableItems = DB::table('barangs')
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
            ->select('barangs.id_barang', 'barangs.nama_barang', 'barangs.tipe_barang', 
                    DB::raw('barangs.jumlah_barang_tersedia - COALESCE(SUM(pinjams.jumlah_barang_dipinjam), 0) AS jumlah_tersedia'))
            ->groupBy('barangs.id_barang', 'barangs.nama_barang', 'barangs.tipe_barang', 'barangs.jumlah_barang_tersedia')
            ->get();

        return view('view-user.ketersediaan', ['items' => $availableItems, 'tanggal_pinjam' => $tanggal_pinjam, 'tanggal_pengembalian' => $tanggal_pengembalian]);
    }

    public function pinjam(Request $request)
    {
        $barangs = Barang::all();
        $users = User::all();
        return view('view-user.pinjam',compact('users'),compact('barangs'));
    }

    public function prosesPinjam(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:barangs,id_barang',
            'jumlah_barang_dipinjam' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);
    
        Pinjam::create([
            'user_id' => $request->user_id,
            'id_barang' => $request->id_barang,
            'jumlah_barang_dipinjam' => $request->jumlah_barang_dipinjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'status' => 'pending', 
        ]);

    $barang = Barang::find($request->id_barang);

    if ($request->jumlah_barang_dipinjam > $barang->jumlah_barang_tersedia) {
        return redirect()->back()->with('error', 'Jumlah yang dipesan melebihi jumlah barang yang tersedia.');
    }

    try {
            return redirect()->back()->with('success', 'Peminjaman berhasil diajukan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Peminjaman tidak berhasil diajukan! Coba lagi');
        }
    }    

    public function riwayat()
    {
        $userId = Auth::id();
        $pinjams = Pinjam::where('user_id', $userId)->with('barang')->paginate(10);

        return view('view-user.riwayat', compact('pinjams'));
    }

   public function cetakPDF($id_pinjam)
{
    $cetak = Pinjam::with(['user', 'barang'])->find($id_pinjam);

    if (!$cetak) {
        abort(404, 'Data tidak ditemukan.');
    }

    $pdf = PDF::loadView('pinjam.surat', compact('cetak'));
    return $pdf->stream("Surat_Peminjaman_{$cetak->id_pinjam}.pdf");
}

}
