<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    protected $table = 'tbl_member'; // Nama tabel
    protected $primaryKey = 'id_member'; // Kolom primary key
    protected $fillable = ['id_member', 'nama_member', 'total_poin', 'nomor_hp', 'email'];
}
