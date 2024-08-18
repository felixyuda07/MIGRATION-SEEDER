<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokModel extends Model
{
    // Nama tabel yang sesuai dengan nama tabel di database
    protected $table = 't_stok';
    
    // Kolom yang bisa diisi massal
    protected $fillable = ['jumlah_stok', 'barang_id']; // Ganti dengan kolom yang sesuai

    // Jika tabel tidak memiliki kolom timestamp
    public $timestamps = false;

    // Menyebutkan kolom primary key
    protected $primaryKey = 'stok_id'; // Ganti dengan nama kolom primary key yang sesuai

    // Tipe primary key (misalnya, string jika menggunakan UUID)
    protected $keyType = 'string'; 

    // Relasi ke model KategoriModel
    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'barang_id'); // Sesuaikan 'kategori_id' dengan nama kolom foreign key
    }
}
