<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class layanan_log extends Model
{
    protected $table = 'layanan_logs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_layanan','id_user','log_type','nama_layanan','satuan','harga','keterangan','status',
    ];

    public function relasiLayanan()
    {
        return $this->belongsTo('App\tb_layanan','id_layanan','id_layanan');
    }

    public function relasiUser()
    {
        return $this->belongsTo('App\users','id_user','id');
    }
}
