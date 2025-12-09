<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class kasir extends Model implements Authenticatable
{
    use AuthenticableTrait;
    
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    // Kolom yang ada di database: id_user, username, password, nama_lengkap, id_level, created_at, updated_at
    protected $fillable = ['id_user', 'username', 'password', 'nama_lengkap', 'id_level'];

    public function member()
    {
        return $this->belongsTo(member::class, 'id_user', 'id_user');
    }

    
    public function getAuthIdentifierName()
    {
        return $this->primaryKey;
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->primaryKey};
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
