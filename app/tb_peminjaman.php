<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class tb_peminjaman extends Model
{
    protected $table = 'tb_peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $fillable = [
        'id_peminjaman', 'id_peminjam', 'id_layanan', 'tgl_order', 'tgl_pinjam', 'tgl_selesai', 'jumlah', 'satuan', 'harga', 'total_harga', 'file', 'keterangan', 'alasan', 'bukti_pembayaran', 'tgl_bayar',
        'is_paid','is_process',
    ];

    public function relasiPeminjamanToLayanan()
    {
        return $this->belongsTo('App\tb_layanan', 'id_layanan', 'id_layanan');
    }

    public function relasiPeminjamanToUser()
    {
        return $this->belongsTo('App\users', 'id_peminjam', 'id');
    }

    public function progress()
    {
        return $this->hasMany('App\progress_penyewaan','id_peminjaman','id_peminjaman');
    }

    public function filePeminjaman()
    {
        return $this->hasMany('App\file_peminjaman','id_peminjaman','id_peminjaman');
    }
}
