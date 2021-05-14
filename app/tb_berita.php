<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tb_berita extends Model
{
    use SoftDeletes;

    protected $table = 'tb_berita';
    protected $primaryKey = 'id_berita';
    protected $fillable = [
        'id_berita','id_laboratorium','judul','isi','timestamp'
    ];

    public $timestamps = [
        'deleted_at',
    ];

    public function relasiBeritaToLaboratorium()
    {
        return $this->belongsTo('App\tb_laboratorium','id_laboratorium','id_laboratorium');
    }



}
