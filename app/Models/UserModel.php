<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    // Nama tabel yang sesuai dengan nama tabel di database
    protected $table = 'm_user';
    
    // Kolom yang bisa diisi massal
    protected $fillable = ['username', 'nama', 'password', 'level_id'];

    // Jika tabel tidak memiliki kolom timestamp
    public $timestamps = false;

    // Menyebutkan kolom primary key
    protected $primaryKey = 'user_id'; // Ganti dengan nama kolom primary key yang sesuai

    // Tipe primary key (misalnya, string jika menggunakan UUID)
    protected $keyType = 'string'; 

    // Relasi dengan LevelModel
    public function level()
    {
        return $this->belongsTo(LevelModel::class, 'level_id');
    }

}
