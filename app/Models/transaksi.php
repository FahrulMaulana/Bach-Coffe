<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = "tbl_transaksi";

    public function member()
    {
        return $this->belongsTo(member::class, 'id_member', 'id_member');
    }

    public function user()
    {
        return $this->belongsTo(kasir::class, 'id_user', 'id_user');
    }

    public function details()
    {
        return $this->hasMany(transaksiDetail::class, 'id_transaksi', 'id_transaksi');
    }

    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['id_user', 'id_member', 'tanggal_transaksi', 'total_harga', 'poin_didapat', 'is_member', 'id_voucher'];
}

class transaksiDetail extends Model
{
    protected $table = "tbl_detail_transaksi";

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class, 'id_transaksi', 'id_transaksi');
    }
    public function produk()
    {
        return $this->belongsTo(produk::class, 'id_produk', 'id_produk');
    }
    protected $primaryKey = 'id_detail_transaksi';
    protected $fillable = ['id_transaksi', 'id_produk', 'quantity', 'harga', 'subtotal'];
}
