<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = "tbl_produk";
    protected $primaryKey = 'id_produk';
    // Kolom yang ada di database: id_produk, nama_produk, harga_produk, promo, foto, created_at, updated_at
    protected $fillable = ['id_produk', 'nama_produk', 'harga_produk', 'promo', 'foto'];
}
