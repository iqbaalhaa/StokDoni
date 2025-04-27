<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Item::create([
            'kode_barang' => 'A100', 
            'nama_barang' => 'Beras',
            'harga_beli' => 50000,
            'satuan' => 'karung', 
            'nama_category' => 'sembako'
        ]);

        \App\Models\Item::create([
            'kode_barang' => 'A200', 
            'nama_barang' => 'Gula',
            'harga_beli' => 10000,
            'satuan' => 'karung', 
            'nama_category' => 'sembako'
        ]);

        \App\Models\Item::create([
            'kode_barang' => 'A300', 
            'nama_barang' => 'Garam',
            'harga_beli' => 8000,
            'satuan' => 'karung', 
            'nama_category' => 'sembako'
        ]);

        \App\Models\Item::create([
            'kode_barang' => 'A400', 
            'nama_barang' => 'Tepung',
            'harga_beli' => 15000,
            'satuan' => 'karung', 
            'nama_category' => 'sembako'
        ]);

        \App\Models\item::create([
            'kode_barang' => 'A500', 
            'nama_barang' => 'Minyak',
            'harga_beli' => 20000,
            'satuan' => 'karung', 
            'nama_category' => 'sembako'
        ]);

        // Beras
        \App\Models\ReceivedItem::create([
            'kode_barang' => 'A100', 
            'jumlah' => 10,  
        ]);

        // Beras
        \App\Models\ReceivedItem::create([
            'kode_barang' => 'A100', 
            'jumlah' => 20,  
        ]);

        // Gula
        \App\Models\ReceivedItem::create([
            'kode_barang' => 'A200', 
            'jumlah' => 100,  
        ]);

        // Gula
        \App\Models\ReceivedItem::create([
            'kode_barang' => 'A200', 
            'jumlah' => 200,  
        ]);

        // Garam
        \App\Models\ReceivedItem::create([
            'kode_barang' => 'A300', 
            'jumlah' => 120,  
        ]);

        // Tepung
        \App\Models\ReceivedItem::create([
            'kode_barang' => 'A400', 
            'jumlah' => 90,  
        ]);

        // Minyak
        \App\Models\ReceivedItem::create([
            'kode_barang' => 'A500', 
            'jumlah' => 150,  
        ]);

        // Minyak
        \App\Models\ReceivedItem::create([
            'kode_barang' => 'A500', 
            'jumlah' => 550,  
        ]);
    }
}
