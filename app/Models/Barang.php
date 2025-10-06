<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //use HasFactory;
    protected $guarded = ['id']; // Memperbolehkan semua field diisi
    protected $fillable = ['nama_barang', 'kategori_id', 'stok', 'harga', 'gambar'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
