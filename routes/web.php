<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalBarang = \App\Models\Barang::count();
    $totalKategori = \App\Models\Kategori::count();
    $totalStok = \App\Models\Barang::sum('stok');
    $barangRendahStok = \App\Models\Barang::where('stok', '<', 10)->count();
    $totalNilaiInventaris = \App\Models\Barang::sum(\DB::raw('stok * harga'));
    $barangTerbaru = \App\Models\Barang::with('kategori')->latest()->take(5)->get();
    $kategoriStats = \App\Models\Kategori::withCount('barangs')->get();

    // Data untuk chart
    $chartData = [
        'labels' => $kategoriStats->pluck('nama_kategori'),
        'data' => $kategoriStats->pluck('barangs_count')
    ];

    return view('dashboard', compact(
        'totalBarang',
        'totalKategori',
        'totalStok',
        'barangRendahStok',
        'totalNilaiInventaris',
        'barangTerbaru',
        'chartData'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('barang', BarangController::class);
    Route::get('barang-export', [BarangController::class, 'export'])->name('barang.export');
    Route::resource('kategori', KategoriController::class);
});

require __DIR__.'/auth.php';