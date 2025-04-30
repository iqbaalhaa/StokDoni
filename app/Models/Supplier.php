<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 
        'alamat',
        'no_wa'
    ];

    public function itemReceived() {
        // return $this->hasMany('nama', 'nama_supplier', Supplier::class);
        return $this->hasMany(ReceivedItem::class, 'nama_supplier', 'nama');
    }

}
