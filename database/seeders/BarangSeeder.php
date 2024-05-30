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
                'tipe_barang' => 'Kursi',
                'jenis_barang' => 'Kursi Lipat',
                'jumlah_barang_tersedia' => 50,
            ],
            [
                'tipe_barang' => 'Kursi',
                'jenis_barang' => 'Kursi Merah',
                'jumlah_barang_tersedia' => 30,
            ],
        ];

        foreach ($barangs as $barang) {
            Barang::create($barang);
        }
    }
}
