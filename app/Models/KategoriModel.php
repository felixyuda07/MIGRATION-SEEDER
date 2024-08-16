<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    // Nama tabel yang sesuai dengan nama tabel di database
    protected $table = 'm_kategori';
    
    // Kolom yang bisa diisi massal
    protected $fillable = ['kategori_kode', 'kategori_nama']; // Ganti dengan kolom yang sesuai

    // Jika tabel tidak memiliki kolom timestamp
    public $timestamps = false;

     // Menyebutkan kolom primary key
     protected $primaryKey = 'kategori_id'; // Ganti dengan nama kolom primary key yang sesuai


    // Tipe primary key (misalnya, string jika menggunakan UUID)
    protected $keyType = 'string'; 

    // Relasi dengan UserModel
    public function users()
    {
        return $this->hasMany(BarangModel::class, 'kategori_id');
    }
}
