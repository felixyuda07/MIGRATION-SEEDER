<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetailModel extends Model
{
    protected $table = 't_penjualan_detail';

    protected $fillable = ['jumlah_barang', 'harga_barang', 'penjualan_id', 'barang_id'];
    
    protected $primaryKey = 'penjualan_detail_id';

    protected $keyType = 'string'; // Atau 'int' jika menggunakan integer

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'barang_id');
    }

    public function penjualan()
    {
        return $this->belongsTo(PenjualanModel::class, 'penjualan_id');
    }
}
