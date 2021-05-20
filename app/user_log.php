<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_log extends Model
{
    protected $table = 'layanan_logs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user_data','id_user','log_type','name','email','alamat','no_hp','status',
    ];

    public function relasiUserData()
    {
        return $this->belongsTo('App\users','id_user_data','id');
    }

    public function relasiUser()
    {
        return $this->belongsTo('App\users','id_user','id');
    }
}
