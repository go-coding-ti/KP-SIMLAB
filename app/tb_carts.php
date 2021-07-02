<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_carts extends Model
{
    protected $fillable = ['id','id_user','id_laboratorium','status'];
    public function laboratorium(){
        return $this->belongsTo('App\tb_laboratorium','id_laboratorium','id_laboratorium');
    }

    public function user(){
        return $this->belongsTo('App\users','id_user','id');
    }
}
