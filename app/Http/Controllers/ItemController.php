<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\ReceivedItem;
use App\Models\LeavingItem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('item.index', [
            'items' => Item::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item.create', [
            'categories' => Category::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|max:10|unique:items',
            'nama_barang' => 'required|max:100|unique:items',
            'harga_beli' => 'required|min:0|numeric',
            'satuan' => 'required|max:100',
            'nama_category' => 'required'
        ]);

        Item::create($validated);

        return redirect('item')->with('success', 'Berhasil menginput data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('item.edit', [
            'item' => $item,
            'categories' => Category::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $rules = [
            'kode_barang' => 'required|max:10',
            'nama_barang' => 'required|max:100',
            'harga_beli' => 'required|min:0|numeric',
            'satuan' => 'required|max:100',
            'nama_category' => 'required'
        ];

        if ($item->kode_barang != $request->kode_barang) {
            $rules['kode_barang'] = 'required|max:10|unique:items';
        }

        if ($item->nama_barang != $request->nama_barang) {
            $rules['nama_barang'] = 'required|max:100|unique:items';
        }

        $validated = $request->validate($rules);

        $item->update($validated);

        return redirect('item')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return back()->with('success', 'Berhasil menghapus data');
    }

    public function opnameStok() {
        $barangMasuk = ReceivedItem::with('barang')->select('kode_barang', DB::raw('SUM(jumlah) as jumlah'))->groupBy('kode_barang')->get();
        $barangKeluar = LeavingItem::select('kode_barang', DB::raw('SUM(jumlah) as jumlah'))->groupBy('kode_barang')->get();

        $getIndexBarangKeluar = [];

        $getSelisih = [];

        // Looping: barangMasuk -> cari kode_barang_masuk didalam $getIndexBarangKeluar, jika ada ambil indexnya -> lalu hitung selisihnya :
        foreach($barangKeluar as $item) {
            $getIndexBarangKeluar[] = $item->kode_barang;
        }
        
        for($i = 0; $i < count($barangMasuk); $i++) {

            $getIndex = array_search($barangMasuk[$i]['kode_barang'], $getIndexBarangKeluar); 
            if($getIndex > -1) {
                $getSelisih[$i]['kode_barang'] = $barangMasuk[$i]->kode_barang; 
                $getSelisih[$i]['sisa'] = $barangMasuk[$i]->jumlah - $barangKeluar[$getIndex]['jumlah']; 
                $getSelisih[$i]['nama_barang'] = $barangMasuk[$i]->barang->nama_barang;
                $getSelisih[$i]['kategori'] = $barangMasuk[$i]->barang->nama_category;
                $getSelisih[$i]['satuan'] = $barangMasuk[$i]->barang->satuan;
            } else {
                $getSelisih[$i]['kode_barang'] = $barangMasuk[$i]->jumlah;
                $getSelisih[$i]['sisa'] = $barangMasuk[$i]->jumlah;
                $getSelisih[$i]['nama_barang'] = $barangMasuk[$i]->barang->nama_barang;
                $getSelisih[$i]['kategori'] = $barangMasuk[$i]->barang->nama_category;
                $getSelisih[$i]['satuan'] = $barangMasuk[$i]->barang->satuan;
            }
        }
        return view('item.opname', [
            'items' => $getSelisih
        ]);
    }

    public function cetakOpname() {
        $barangMasuk = ReceivedItem::with('barang')->select('kode_barang', DB::raw('SUM(jumlah) as jumlah'))->groupBy('kode_barang')->get();
        $barangKeluar = LeavingItem::select('kode_barang', DB::raw('SUM(jumlah) as jumlah'))->groupBy('kode_barang')->get();

        $getIndexBarangKeluar = [];

        $getSelisih = [];

        // Looping: barangMasuk -> cari kode_barang_masuk didalam $getIndexBarangKeluar, jika ada ambil indexnya -> lalu hitung selisihnya :
        foreach($barangKeluar as $item) {
            $getIndexBarangKeluar[] = $item->kode_barang;
        }
        
        for($i = 0; $i < count($barangMasuk); $i++) {

            $getIndex = array_search($barangMasuk[$i]['kode_barang'], $getIndexBarangKeluar); 
            if($getIndex > -1) {
                $getSelisih[$i]['kode_barang'] = $barangMasuk[$i]->kode_barang; 
                $getSelisih[$i]['sisa'] = $barangMasuk[$i]->jumlah - $barangKeluar[$getIndex]['jumlah']; 
                $getSelisih[$i]['nama_barang'] = $barangMasuk[$i]->barang->nama_barang;
                $getSelisih[$i]['kategori'] = $barangMasuk[$i]->barang->nama_category;
                $getSelisih[$i]['satuan'] = $barangMasuk[$i]->barang->satuan;
            } else {
                $getSelisih[$i]['kode_barang'] = $barangMasuk[$i]->jumlah;
                $getSelisih[$i]['sisa'] = $barangMasuk[$i]->jumlah;
                $getSelisih[$i]['nama_barang'] = $barangMasuk[$i]->barang->nama_barang;
                $getSelisih[$i]['kategori'] = $barangMasuk[$i]->barang->nama_category;
                $getSelisih[$i]['satuan'] = $barangMasuk[$i]->barang->satuan;
            }
        }

        return view('item.cetakOpname', [
            'data' => $getSelisih
        ]);
    }
}
