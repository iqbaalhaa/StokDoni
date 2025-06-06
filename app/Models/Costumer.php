<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use HasFactory;

    // protected $table = 'customers';
    
    protected $fillable = [
        'nama',
        'no_wa',
        'alamat'
    ];

    public function itemLeaving() {
        return $this->hasMany(LeavingItem::class, 'nama_costumer', 'nama');
    }
}
