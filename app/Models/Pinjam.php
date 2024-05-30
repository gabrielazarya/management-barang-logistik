<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pinjam';
    protected $fillable = [
        'jumlah_barang_dipinjam',
        'tanggal_pinjam',
        'tanggal_pengembalian',
    ];

    protected $hidden = [
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
