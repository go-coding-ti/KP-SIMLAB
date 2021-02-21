<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class tb_peminjaman extends Model
{
    protected $table = 'tb_peminjaman';
    protected $fillable = [
        'id_peminjaman','id_peminjam','id_layanan','tgl_order','tgl_pinjam','tgl_selesai','jumlah','satuan','harga','total_harga','file','keterangan','alasan',
    ];

}
