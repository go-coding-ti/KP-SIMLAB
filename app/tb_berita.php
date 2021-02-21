<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_berita extends Model
{
    protected $table = 'tb_berita';
    protected $fillable = [
        'id_berita','id_laboratorium','judul','isi',
    ];
}
