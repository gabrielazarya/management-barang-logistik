<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    protected $model = Barang::class;

    public function definition()
    {
        return [
            'nama_barang' => $this->faker->word,
            'tipe_barang' => $this->faker->word,
            'jumlah_barang_tersedia' => $this->faker->numberBetween(1, 100),
        ];
    }
}
