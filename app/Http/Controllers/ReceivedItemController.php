<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ReceivedItem;
use App\Models\Supplier;

use Illuminate\Http\Request;

class ReceivedItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('received.index', [
            'items' => ReceivedItem::with('barang')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('received.create', [
            'suppliers' => Supplier::latest()->get(),
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
            'nama_supplier' => 'required'
        ]);

        ReceivedItem::create($validated);

        return redirect('received-item')->with('success', 'Berhasil menginput data');
    }

    /**
     * Display the specified resource.
     */
    public function show(ReceivedItem $receivedItem)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReceivedItem $receivedItem)
    {
        return view('received.edit', [
            'suppliers' => Supplier::latest()->get(),
            'items' => Item::latest()->get(),
            'receivedItem' => $receivedItem
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReceivedItem $receivedItem)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|max:10',
            'jumlah' => 'required|numeric|min:1',
            'nama_supplier' => 'required'
        ]);

        $receivedItem->update($validated);

        return redirect('received-item')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReceivedItem $receivedItem)
    {
        $receivedItem->delete();
        return back()->with('success', 'Berhasil menghapus data');
    }

    public function cetak(Request $request) {
        $data = ReceivedItem::with('barang')->whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])->latest()->get();       
        
        return view('received.cetak', [
            'data' => $data,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir
        ]);
    }
}
