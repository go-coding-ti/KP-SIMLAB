<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laboratorium_log extends Model
{
    protected $table = 'laboratorium_logs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_laboratorium','id_user','log_type','nama_lab','alamat','no_telp','foto_lab','status',
    ];

    public function relasiLaboratorium()
    {
        return $this->belongsTo('App\tb_laboratorium','id_laboratorium','id_laboratorium');
    }

    public function relasiUser()
    {
        return $this->belongsTo('App\users','id_user','id');
    }
}
