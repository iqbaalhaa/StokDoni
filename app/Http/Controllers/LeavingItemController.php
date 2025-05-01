<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Item;
use App\Models\LeavingItem;
use Illuminate\Http\Request;

class LeavingItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('leaved.index', [
            'items' => LeavingItem::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leaved.create', [
            'costumers' => Costumer::latest()->get(),
            'items' => Item::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|max:10',
            'jumlah' => 'required|numeric|min:1',
            'nama_costumer' => 'required'
        ]);

        LeavingItem::create($validated);

        return redirect('leaving-item')->with('success', 'Berhasil menginput data');
    }

    /**
     * Display the specified resource.
     */
    public function show(LeavingItem $leavingItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeavingItem $leavingItem)
    {
        return view('leaved.edit', [
            'leavingItem' => $leavingItem, 
            'costumers' => Costumer::latest()->get(),
            'items' => Item::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeavingItem $leavingItem)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|max:10',
            'jumlah' => 'required|numeric|min:1',
            'nama_costumer' => 'required'
        ]);

        $leavingItem->update($validated);

        return redirect('leaving-item')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeavingItem $leavingItem)
    {
        $leavingItem->delete();

        return back()->with('success', 'Berhasil menghapus data');
    }

    public function cetak(Request $request) {
        $data = LeavingItem::with('barang')->whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])->latest()->get();       
        
        // return $data;
        return view('leaved.cetak', [
            'data' => $data,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir
        ]);
    }
}
