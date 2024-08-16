<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    // Nama tabel yang sesuai dengan nama tabel di database
    protected $table = 'm_level';
    
    // Kolom yang bisa diisi massal
    protected $fillable = ['level_kode', 'level_nama']; // Ganti dengan kolom yang sesuai

    // Jika tabel tidak memiliki kolom timestamp
    public $timestamps = false;

     // Menyebutkan kolom primary key
     protected $primaryKey = 'level_id'; // Ganti dengan nama kolom primary key yang sesuai


    // Tipe primary key (misalnya, string jika menggunakan UUID)
    protected $keyType = 'string'; 

    // Relasi dengan UserModel
    public function users()
    {
        return $this->hasMany(UserModel::class, 'level_id');
    }
}
