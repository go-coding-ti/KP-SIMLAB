<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_bidang extends Model
{
    protected $table = 'tb_bidang';
    protected $fillable = [
        'id_bidang','nama_bidang','id_laboratorium',
    ];
}
