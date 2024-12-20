<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Ensure this line is present
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';
    protected $primaryKey = 'id_barang';
    protected $fillable = ['nama_barang', 'tipe_barang', 'jumlah_barang_tersedia'];

    public function pinjams()
    {
        return $this->hasMany(Pinjam::class, 'id_barang', 'id_barang');
    }
}