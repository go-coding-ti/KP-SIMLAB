<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_bidang extends Model
{
    protected $table = 'tb_bidang';
    protected $primaryKey = 'id_bidang';
    protected $fillable = [
        'id_bidang','nama_bidang','id_laboratorium',
    ];

    public function relasiBidangtoLayanan(){
    	return $this->hasMany('App\tb_layanan','id_bidang', 'id_bidang');
    }

    public function relasiBidangToLaboratorium()
    {
        return $this->belongsTo('App\tb_laboratorium','id_laboratorium','id_laboratorium');
    }
}
