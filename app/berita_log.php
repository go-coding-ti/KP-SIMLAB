<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class berita_log extends Model
{
    protected $table = 'berita_logs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_berita','id_user','log_type','judul','isi','tanggal','status',
    ];

    public function relasiBerita()
    {
        return $this->belongsTo('App\tb_berita','id_berita','id_berita');
    }

    public function relasiUser()
    {
        return $this->belongsTo('App\users','id_user','id');
    }
}
