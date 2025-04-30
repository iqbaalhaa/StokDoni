<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('supplier.index', [
            'items' => Supplier::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:200|unique:suppliers',
            'alamat' => 'required|max:200',
            'no_wa' => 'required|max:20'
        ]);

        Supplier::create($validated);

        return redirect('supplier')->with('success', 'Berhasil menginput data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', [
            'item' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $rules = [
            'nama' => 'required|max:200',
            'alamat' => 'required|max:200',
            'no_wa' => 'required|max:20'   
        ];

        if ($request->nama != $supplier->nama) {
            $rules['nama'] = 'required|max:200|unique:suppliers';
        }

        if ($request->no_wa != $supplier->no_wa) {
            $rules['no_wa'] = 'required|max:200|unique:suppliers';
        }

        $validated = $request->validate($rules);

        $supplier->update($validated);

        return redirect('supplier')->with('success', 'Berhasil mengupdate data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return back()->with('success', 'Berhasil mengupdate data');
    }
}
