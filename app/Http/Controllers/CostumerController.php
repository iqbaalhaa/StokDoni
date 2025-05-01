<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customer.index', [
            'custumers' => Costumer::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:200|unique:costumers',
            'no_wa' => 'required|max:20|unique:costumers',
            'alamat' => 'required|max:200'
        ]);

        Costumer::create($validated);

        return redirect('costumer')->with('success', 'Berhasil menginput data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Costumer $costumer)
    {
        return view('customer.showRecord', [
            'costumer' => $costumer->load('itemLeaving')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Costumer $costumer)
    {

        return view('customer.edit', [
            'costumer' => $costumer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Costumer $costumer)
    {
        $rules = [
            'nama' => 'required|max:200',
            'no_wa' => 'required|max:20',
            'alamat' => 'required|max:200'
        ];

        if ($request->nama != $costumer->nama) {
            $rules['nama'] = 'required|max:200|unique:costumers';
        }

        if ($request->no_wa != $costumer->no_wa) {
            $rules['no_wa'] = 'required|max:200|unique:costumers';
        }

        $validated = $request->validate($rules);

        $costumer->update($validated);

        return redirect('costumer')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Costumer $costumer)
    {
        $costumer->delete();

        return back()->with('success', 'Berhasil menghapus data');
    }
}
