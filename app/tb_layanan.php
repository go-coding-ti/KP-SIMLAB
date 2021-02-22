<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tb_layanan extends Model
{
    use SoftDeletes;
    protected $table = 'tb_layanan';
    protected $primaryKey = 'id_layanan';
    protected $fillable = [
        'id_layanan','nama_layanan','unit_satuan','satuan','harga','id_bidang','keterangan',
    ];
}
