<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanModel extends Model
{
    protected $table = 't_penjualan';
    
    // Kolom yang bisa diisi massal
    protected $fillable = ['tanggal_penjualan', 'total_harga']; // Ganti dengan kolom yang sesuai

    // Jika tabel tidak memiliki kolom timestamp
    public $timestamps = false;

    // Menyebutkan kolom primary key
    protected $primaryKey = 'penjualan_id'; // Ganti dengan nama kolom primary key yang sesuai

    // Tipe primary key (misalnya, string jika menggunakan UUID)
    protected $keyType = 'string'; 

    public function penjualandetail()
    {
        return $this->hasMany(PenjualanDetailModel::class, 'barang_id');
    }
}
