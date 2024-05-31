<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pinjam;
use Illuminate\Support\Facades\DB;

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
    public function pinjam()
    {
        return view('view-user.pinjam');
    }
    public function riwayat()
    {
        return view('view-user.riwayat');
    }

    
}
