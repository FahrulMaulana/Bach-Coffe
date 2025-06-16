<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    protected $table = "tbl_voucher";
    public function member()
    {
        return $this->belongsTo(member::class, 'id_member', 'id_member');
    }
    protected $primaryKey = 'id_voucher';
    protected $fillable = ['id_member', 'kode_voucher', 'poin_terpakai', 'status_voucher', 'tanggal_klaim'];
}
