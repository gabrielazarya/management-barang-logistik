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
                'nama_barang' => 'Kursi Kantor',
                'tipe_barang' => 'Kursi',
                'jumlah_barang_tersedia' => 30,
            ],
            [
                'nama_barang' => 'Kursi Kuliah',
                'tipe_barang' => 'Kursi',
                'jumlah_barang_tersedia' => 100,
            ],
            [
                'nama_barang' => 'Meja Belajar',
                'tipe_barang' => 'Meja',
                'jumlah_barang_tersedia' => 50,
            ],
            [
                'nama_barang' => 'Meja Kantor',
                'tipe_barang' => 'Meja',
                'jumlah_barang_tersedia' => 20,
            ],
            [
                'nama_barang' => 'Meja Rapat',
                'tipe_barang' => 'Meja',
                'jumlah_barang_tersedia' => 10,
            ],
            [
                'nama_barang' => 'Meja Komputer',
                'tipe_barang' => 'Meja',
                'jumlah_barang_tersedia' => 35,
            ],
            [
                'nama_barang' => 'TV LED 42 Inch',
                'tipe_barang' => 'TV',
                'jumlah_barang_tersedia' => 5,
            ],
            [
                'nama_barang' => 'TV Plasma 50 Inch',
                'tipe_barang' => 'TV',
                'jumlah_barang_tersedia' => 3,
            ],
            [
                'nama_barang' => 'TV Smart 32 Inch',
                'tipe_barang' => 'TV',
                'jumlah_barang_tersedia' => 7,
            ],
            [
                'nama_barang' => 'Proyektor LCD',
                'tipe_barang' => 'Proyektor',
                'jumlah_barang_tersedia' => 10,
            ],
            [
                'nama_barang' => 'Proyektor DLP',
                'tipe_barang' => 'Proyektor',
                'jumlah_barang_tersedia' => 6,
            ],
            [
                'nama_barang' => 'Sofa 3-Seater',
                'tipe_barang' => 'Sofa',
                'jumlah_barang_tersedia' => 8,
            ],
            [
                'nama_barang' => 'Sofa 2-Seater',
                'tipe_barang' => 'Sofa',
                'jumlah_barang_tersedia' => 12,
            ],
            [
                'nama_barang' => 'Sofa L-Shaped',
                'tipe_barang' => 'Sofa',
                'jumlah_barang_tersedia' => 5,
            ],
            [
                'nama_barang' => 'Kabel LAN',
                'tipe_barang' => 'Elektronik',
                'jumlah_barang_tersedia' => 50,
            ],
            [
                'nama_barang' => 'Kabel AUX',
                'tipe_barang' => 'Elektronik',
                'jumlah_barang_tersedia' => 100,
            ],
            [
                'nama_barang' => 'Kabel HDMI',
                'tipe_barang' => 'Elektronik',
                'jumlah_barang_tersedia' => 30,
            ],
            [
                'nama_barang' => 'Adaptor Laptop',
                'tipe_barang' => 'Elektronik',
                'jumlah_barang_tersedia' => 20,
            ],
            [
                'nama_barang' => 'Charger HP',
                'tipe_barang' => 'Elektronik',
                'jumlah_barang_tersedia' => 60,
            ],
            [
                'nama_barang' => 'Mouse',
                'tipe_barang' => 'Elektronik',
                'jumlah_barang_tersedia' => 80,
            ],
            [
                'nama_barang' => 'Keyboard',
                'tipe_barang' => 'Elektronik',
                'jumlah_barang_tersedia' => 40,
            ],
            [
                'nama_barang' => 'Flash Drive 16GB',
                'tipe_barang' => 'Elektronik',
                'jumlah_barang_tersedia' => 50,
            ],
            [
                'nama_barang' => 'Hard Disk Eksternal 1TB',
                'tipe_barang' => 'Elektronik',
                'jumlah_barang_tersedia' => 15,
            ],
            [
                'nama_barang' => 'Speaker Bluetooth',
                'tipe_barang' => 'Speaker',
                'jumlah_barang_tersedia' => 15,
            ],
            [
                'nama_barang' => 'Speaker Aktif',
                'tipe_barang' => 'Speaker',
                'jumlah_barang_tersedia' => 10,
            ],
            [
                'nama_barang' => 'Speaker Subwoofer',
                'tipe_barang' => 'Speaker',
                'jumlah_barang_tersedia' => 5,
            ],
            
        ];

        foreach ($barangs as $barang) {
            Barang::create($barang);
        }
    }
}
