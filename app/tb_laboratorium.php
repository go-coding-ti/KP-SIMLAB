<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tb_laboratorium extends Model
{
    use SoftDeletes;

    protected $table = 'tb_laboratorium';
    protected $primaryKey = 'id_laboratorium';
    protected $fillable = [
        'id_laboratorium','nama_lab','alamat','no_telp','foto_lab'
    ];

    public $timestamps = [ 'deleted_at', ];
    public function relasiLaboratoriumToBidang()
    {
        return $this->hasMany('App\tb_bidang','id_laboratorium','id_laboratorium');
    }
}
