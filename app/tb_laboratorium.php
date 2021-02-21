<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_laboratorium extends Model
{
    protected $table = 'tb_laboratorium';
    protected $fillable = [
        'id_laboratorium','nama_lab','alamat','no_telp','foto_lab'
    ];
}
