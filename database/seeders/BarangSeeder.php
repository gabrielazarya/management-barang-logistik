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
            [
                'tipe_barang' => 'Kursi',
                'jenis_barang' => 'Kursi Kantor',
                'jumlah_barang_tersedia' => 30,
            ],
            [
                'tipe_barang' => 'Kursi',
                'jenis_barang' => 'Kursi Kuliah',
                'jumlah_barang_tersedia' => 100,
            ],
            [
                'tipe_barang' => 'Meja',
                'jenis_barang' => 'Meja Belajar',
                'jumlah_barang_tersedia' => 50,
            ],
            [
                'tipe_barang' => 'Meja',
                'jenis_barang' => 'Meja Kantor',
                'jumlah_barang_tersedia' => 20,
            ],
            [
                'tipe_barang' => 'Meja',
                'jenis_barang' => 'Meja Rapat',
                'jumlah_barang_tersedia' => 10,
            ],
            [
                'tipe_barang' => 'Meja',
                'jenis_barang' => 'Meja Komputer',
                'jumlah_barang_tersedia' => 35,
            ],
            [
                'tipe_barang' => 'TV',
                'jenis_barang' => 'TV LED 42 Inch',
                'jumlah_barang_tersedia' => 5,
            ],
            [
                'tipe_barang' => 'TV',
                'jenis_barang' => 'TV Plasma 50 Inch',
                'jumlah_barang_tersedia' => 3,
            ],
            [
                'tipe_barang' => 'TV',
                'jenis_barang' => 'TV Smart 32 Inch',
                'jumlah_barang_tersedia' => 7,
            ],
            [
                'tipe_barang' => 'Proyektor',
                'jenis_barang' => 'Proyektor LCD',
                'jumlah_barang_tersedia' => 10,
            ],
            [
                'tipe_barang' => 'Proyektor',
                'jenis_barang' => 'Proyektor DLP',
                'jumlah_barang_tersedia' => 6,
            ],
            [
                'tipe_barang' => 'Sofa',
                'jenis_barang' => 'Sofa 3-Seater',
                'jumlah_barang_tersedia' => 8,
            ],
            [
                'tipe_barang' => 'Sofa',
                'jenis_barang' => 'Sofa 2-Seater',
                'jumlah_barang_tersedia' => 12,
            ],
            [
                'tipe_barang' => 'Sofa',
                'jenis_barang' => 'Sofa L-Shaped',
                'jumlah_barang_tersedia' => 5,
            ],
            [
                'tipe_barang' => 'Elektronik',
                'jenis_barang' => 'Kabel LAN',
                'jumlah_barang_tersedia' => 50,
            ],
            [
                'tipe_barang' => 'Elektronik',
                'jenis_barang' => 'Kabel AUX',
                'jumlah_barang_tersedia' => 100,
            ],
            [
                'tipe_barang' => 'Elektronik',
                'jenis_barang' => 'Kabel HDMI',
                'jumlah_barang_tersedia' => 30,
            ],
            [
                'tipe_barang' => 'Elektronik',
                'jenis_barang' => 'Adaptor Laptop',
                'jumlah_barang_tersedia' => 20,
            ],
            [
                'tipe_barang' => 'Elektronik',
                'jenis_barang' => 'Charger HP',
                'jumlah_barang_tersedia' => 60,
            ],
            [
                'tipe_barang' => 'Elektronik',
                'jenis_barang' => 'Mouse',
                'jumlah_barang_tersedia' => 80,
            ],
            [
                'tipe_barang' => 'Elektronik',
                'jenis_barang' => 'Keyboard',
                'jumlah_barang_tersedia' => 40,
            ],
            [
                'tipe_barang' => 'Elektronik',
                'jenis_barang' => 'Flash Drive 16GB',
                'jumlah_barang_tersedia' => 50,
            ],
            [
                'tipe_barang' => 'Elektronik',
                'jenis_barang' => 'Hard Disk Eksternal 1TB',
                'jumlah_barang_tersedia' => 15,
            ],
            [
                'tipe_barang' => 'Speaker',
                'jenis_barang' => 'Speaker Bluetooth',
                'jumlah_barang_tersedia' => 15,
            ],
            [
                'tipe_barang' => 'Speaker',
                'jenis_barang' => 'Speaker Aktif',
                'jumlah_barang_tersedia' => 10,
            ],
            [
                'tipe_barang' => 'Speaker',
                'jenis_barang' => 'Speaker Subwoofer',
                'jumlah_barang_tersedia' => 5,
            ],
            
        ];

        foreach ($barangs as $barang) {
            Barang::create($barang);
        }
    }
}
