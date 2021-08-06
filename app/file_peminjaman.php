<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class file_peminjaman extends Model
{
    use SoftDeletes;

    protected $table = 'tb_file_peminjaman';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_peminjaman', 'nama_file',
    ];

    public $timestamps = [
        'deleted_at',
    ];

    public function filePeminjaman()
    {
        return $this->belongsTo('App\tb_peminjaman', 'id_peminjaman', 'id_peminjaman');
    }

}
