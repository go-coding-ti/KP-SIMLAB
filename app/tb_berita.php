<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_berita extends Model
{
    protected $table = 'tb_berita';
    protected $primaryKey = 'id_berita';
    protected $fillable = [
        'id_berita','id_laboratorium','judul','isi',
    ];
    
    public function relasiBidangToLaboratorium()
    {
        return $this->belongsTo('App\tb_laboratorium','id_laboratorium','id_laboratorium');
    }

}
