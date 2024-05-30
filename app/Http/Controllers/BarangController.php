<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function ketersediaan(Request $request)
    {
        $date = $request->input('date', date('Y-m-d')); // Default to today's date if not provided

        $availableItems = DB::table('barangs')
            ->leftJoin('pinjam', function ($join) use ($date) {
                $join->on('barangs.id_barang', '=', 'pinjam.id_barang')
                    ->where('pinjam.status', '=', 'terima')
                    ->where('pinjam.tanggal_pinjam', '<=', $date)
                    ->where('pinjam.tanggal_pengembalian', '>=', $date);
            })
            ->select('barangs.id_barang', 'barangs.nama_barang', 'barangs.tipe_barang', 
                    DB::raw('barangs.jumlah_barang_tersedia - COALESCE(SUM(pinjam.jumlah_pinjam), 0) AS jumlah_tersedia'))
            ->groupBy('barangs.id_barang', 'barangs.nama_barang', 'barangs.tipe_barang', 'barangs.jumlah_barang_tersedia')
            ->get();

        return view('ketersediaan', ['items' => $availableItems, 'date' => $date]);
    }

    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'tipe_barang' => 'required|string|max:255',
            'jumlah_barang_tersedia' => 'required|integer',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }
}
