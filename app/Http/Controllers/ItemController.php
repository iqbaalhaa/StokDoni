<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;

use Illuminate\Http\Request;

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
}
