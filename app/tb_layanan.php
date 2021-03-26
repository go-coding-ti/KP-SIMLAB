<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tb_layanan extends Model
{
    use SoftDeletes;
    protected $table = 'tb_layanan';
    protected $primaryKey = 'id_layanan';
    protected $fillable = [
        'id_layanan','nama_layanan','unit_satuan','satuan','harga','id_bidang','keterangan','status',
    ];

    public function relasiLayananToBidang()
    {
    	return $this->belongsTo('App\tb_bidang','id_bidang','id_bidang');
    }

    public function relasiLayananToPeminjaman()
    {
        return $this->hasMany('App\tb_peminjaman','id_layanan','id_layanan');
    }
}
