<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Costumer::all();
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Costumer::create($validated);

        return redirect()->route('customer.index')
            ->with('success', 'Data pelanggan berhasil ditambahkan');
    }

    public function edit(Costumer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, Costumer $customer)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer->update($validated);

        return redirect()->route('customer.index')
            ->with('success', 'Data pelanggan berhasil diperbarui');
    }

    public function destroy(Costumer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index')
            ->with('success', 'Data pelanggan berhasil dihapus');
    }
} 