<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tb_bidang extends Model
{
    use SoftDeletes;

    protected $table = 'tb_bidang';
    protected $primaryKey = 'id_bidang';
    protected $fillable = [
        'id_bidang','nama_bidang','id_laboratorium','status','status_aktif','keterangan_perubahan','keterangan_aktif',
    ];

    public $timestamps = [ 'deleted_at', ];

    public function relasiBidangtoLayanan(){
    	return $this->hasMany('App\tb_layanan','id_bidang', 'id_bidang');
    }

    public function relasiBidangToLaboratorium()
    {
        return $this->belongsTo('App\tb_laboratorium','id_laboratorium','id_laboratorium');
    }
}
