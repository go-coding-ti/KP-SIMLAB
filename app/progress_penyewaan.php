<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class progress_penyewaan extends Model
{
    use SoftDeletes;

    protected $table = 'tb_progress_penyewaan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_peminjaman','progress_name','progress_detail'
    ];

    public $timestamps = [
        'deleted_at',
    ];

    public function progress()
    {
        return $this->belongsTo('App\tb_peminjaman','id_peminjaman','id_peminjaman');
    }
}
