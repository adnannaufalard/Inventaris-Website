<?php

namespace App\Http\Controllers;

use App\Models\Barang; // <-- TAMBAHKAN BARIS INI
use App\Models\Kategori;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Barang::with('kategori');

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            if ($search === 'stok_rendah') {
                $query->where('stok', '<', 10);
            } else {
                $query->where('nama_barang', 'like', '%' . $search . '%')
                      ->orWhereHas('kategori', function($q) use ($search) {
                          $q->where('nama_kategori', 'like', '%' . $search . '%');
                      });
            }
        }

        $barangs = $query->latest()->paginate(10);
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('barang.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Debug: cek apakah file diterima
        // dd($request->all(), $request->hasFile('gambar'), $request->file('gambar'));

        // Validasi data
        $request->validate([
            'nama_barang' => 'required|string|max:200',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('barang', 'public');
        }

        Barang::create($data);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::with('kategori')->findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();
        return view('barang.edit', compact('barang', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $request->validate([
            'nama_barang' => 'required|string|max:200',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $barang = Barang::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($barang->gambar && \Storage::disk('public')->exists($barang->gambar)) {
                \Storage::disk('public')->delete($barang->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('barang', 'public');
        }

        $barang->update($data);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }

    /**
     * Export data barang ke CSV.
     */
    public function export()
    {
        $barangs = Barang::with('kategori')->get();

        $filename = "barang_" . date('Y-m-d_H-i-s') . ".csv";

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($barangs) {
            $file = fopen('php://output', 'w');

            // Header
            fputcsv($file, ['Nama Barang', 'Kategori', 'Stok', 'Harga']);

            // Data
            foreach ($barangs as $barang) {
                fputcsv($file, [
                    $barang->nama_barang,
                    $barang->kategori->nama_kategori ?? 'Tanpa Kategori',
                    $barang->stok,
                    $barang->harga,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
