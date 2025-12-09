<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    protected $table = "tbl_voucher";
    protected $primaryKey = 'id_voucher';
    // Kolom yang ada di database: id_voucher, id_member, kode_voucher, poin_terpakai, status_voucher, tanggal_klaim, created_at, updated_at
    protected $fillable = ['id_member', 'kode_voucher', 'poin_terpakai', 'status_voucher', 'tanggal_klaim'];
    
    public function member()
    {
        return $this->belongsTo(member::class, 'id_member', 'id_member');
    }
}
