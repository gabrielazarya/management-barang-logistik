<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Barang::truncate();

        $barangs = [
            [
                'nama_barang' => 'Kursi Lipat',
                'tipe_barang' => 'Kursi',
                'jumlah_barang_tersedia' => 50,
            ],
            [
                'nama_barang' => 'Kursi Merah',
                'tipe_barang' => 'Kursi',
                'jumlah_barang_tersedia' => 30,
            ],
            [
                'nama_barang' => 'Kursi Hitam',
                'tipe_barang' => 'Kursi',
                'jumlah_barang_tersedia' => 40,
            ]
        ];

        foreach ($barangs as $barang) {
            Barang::create($barang);
        }
    }
}
