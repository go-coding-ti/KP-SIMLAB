<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tb_laboran extends Model
{
    use SoftDeletes;

    protected $table = 'tb_laboran';
    protected $primaryKey = 'id_laboran';
    protected $fillable = [
        'hak_akses','id_user','id_laboratorium',
    ];

    public $timestamps = [ 'deleted_at', ];

    public function labRelation(){
        return $this->belongsTo('App\tb_laboratorium','id_laboratorium','id_laboratorium');
    }

    public function userRelation(){
        return $this->belongsTo('App\users','id_user');
    }
}
