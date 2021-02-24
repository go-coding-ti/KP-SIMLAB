<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'id','name','email_verified_at','password','remember_token','alamat','no_hp','hak_akses','foto_user',
    ];

    public function relasiUserToPeminjaman()
    {
        return $this->hasMany('App\tb_peminjaman','id_peminjam','id');
    }
}
