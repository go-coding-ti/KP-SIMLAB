<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bidang_log extends Model
{
    protected $table = 'bidang_logs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_bidang','id_user','log_type','nama_bidang','status',
    ];

    public function relasiBidang()
    {
        return $this->belongsTo('App\tb_bidang','id_bidang','id_bidang');
    }

    public function relasiUser()
    {
        return $this->belongsTo('App\users','id_user','id');
    }
}
