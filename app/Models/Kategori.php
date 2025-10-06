<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //use HasFactory;
    protected $guarded = ['id']; // Memperbolehkan semua field diisi

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}
