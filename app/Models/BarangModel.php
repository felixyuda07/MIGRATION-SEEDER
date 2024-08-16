<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    // Nama tabel yang sesuai dengan nama tabel di database
    protected $table = 'm_barang';
    
    // Kolom yang bisa diisi massal
    protected $fillable = ['nama_barang', 'kategori_id']; // Ganti dengan kolom yang sesuai

    // Jika tabel tidak memiliki kolom timestamp
    public $timestamps = false;

    // Menyebutkan kolom primary key
    protected $primaryKey = 'barang_id'; // Ganti dengan nama kolom primary key yang sesuai

    // Tipe primary key (misalnya, string jika menggunakan UUID)
    protected $keyType = 'string'; 

    // Relasi ke model KategoriModel
    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id'); // Sesuaikan 'kategori_id' dengan nama kolom foreign key
    }
}
