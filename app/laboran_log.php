<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laboran_log extends Model
{
    protected $table = 'laboran_logs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_laboran','id_user','log_type','hak_akses','status',
    ];

    public function relasiLaboran()
    {
        return $this->belongsTo('App\tb_laboran','id_laboran','id_laboran');
    }

    public function relasiUser()
    {
        return $this->belongsTo('App\users','id_user','id');
    }
}
