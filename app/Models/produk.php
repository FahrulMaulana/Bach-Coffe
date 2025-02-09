<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = "tbl_produk";
    protected $primaryKey = 'id_produk';
    protected $fillable = ['id_produk', 'nama_produk', 'harga_produk', 'promo', 'foto'];
}
