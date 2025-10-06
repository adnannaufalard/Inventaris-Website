<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Barang;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::latest()->paginate(10);
        return view('kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategoris',
            'deskripsi' => 'nullable|string',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategoris,nama_kategori,' . $kategori->id,
            'deskripsi' => 'nullable|string',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        // Cek jika ada barang yang terkait dengan kategori ini
        if ($kategori->barangs()->count() > 0) {
            return redirect()->route('kategori.index')
                             ->with('error', 'Kategori tidak dapat dihapus karena masih memiliki barang terkait.');
        }

        $kategori->delete();

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori berhasil dihapus.');
    }
}