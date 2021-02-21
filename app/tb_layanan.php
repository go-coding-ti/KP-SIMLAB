<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_layanan extends Model
{
    protected $table = 'tb_layanan';
    protected $fillable = [
        'id_layanan','nama_layanan','unit_satuan','satuan','harga','id_bidang','keterangan',
    ];
}
