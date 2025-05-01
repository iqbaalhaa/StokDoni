<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeavingItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'jumlah',
        'nama_costumer',
    ];

    public function barang() {
        return $this->belongsTo(Item::class, 'kode_barang', 'kode_barang');
    }

}
