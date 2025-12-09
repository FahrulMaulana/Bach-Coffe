<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    protected $table = 'tbl_member';
    protected $primaryKey = 'id_member';
    // Kolom yang ada di database: id_member, nomor_hp, nama_member, email, total_poin, id_user, created_at, updated_at
    protected $fillable = ['id_member', 'nama_member', 'total_poin', 'nomor_hp', 'email', 'id_user'];
}
