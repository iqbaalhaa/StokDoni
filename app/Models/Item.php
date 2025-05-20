<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'harga_beli',
        'satuan',
        'nama_category'
    ];

    public function stokMasuk() {
        return $this->hasMany(ReceivedItem::class, 'kode_barang', 'kode_barang');
    }

}
