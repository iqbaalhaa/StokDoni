<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivedItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'jumlah',
        'nama_supplier'
    ];

    public function barang() {
        // return $this->belongsTo('kode_barang', 'kode_barang', Item::class);
        return $this->belongsTo(Item::class, 'kode_barang', 'kode_barang');
    }

}
