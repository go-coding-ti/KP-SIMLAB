<?php

namespace App\Http\Controllers;


use App\berita_log;
use App\bidang_log;
use App\laboran_log;
use App\laboratorium_log;
use App\layanan_log;
use App\user_log;
use Illuminate\Support\Facades\Auth;

class logs_class
{
    /*Fungsi digunakan untuk melakukan logging pada setiap tabel
        setiap ada perubahan maupun penambahan data,
        maka akan ditambahkan,
        oleh karena itu, fungsi ini akan terus dijalankan pada setiap crud di controller*/

    public static function berita_logs($id_berita, $id_user, $log_type, $judul, $isi, $tanggal)
    {
        $status = berita_log::where('id_berita', $id_berita)->max('status');
        $data = berita_log::create([
            'id_berita' => $id_berita,
            'id_user' => $id_user,
            'log_type' => $log_type,
            'judul' => $judul,
            'isi' => $isi,
            'tanggal' => $tanggal,
            'status' => $status + 1,
        ]);
        return $data;
    }

    public static function layanan_logs($id_layanan, $id_user, $log_type, $nama_layanan, $satuan, $harga, $keterangan)
    {
        $status = layanan_log::where('id_layanan', $id_layanan)->max('status');
        layanan_log::create([
            'id_layanan' => $id_layanan,
            'id_user' => $id_user,
            'log_type' => $log_type,
            'nama_layanan' => $nama_layanan,
            'satuan' => $satuan,
            'harga' => $harga,
            'keterangan' => $keterangan,
            'status' => $status + 1,
        ]);
    }

    public static function bidang_logs($id_bidang, $id_user, $log_type, $nama_bidang)
    {
        $status = bidang_log::where('id_bidang', $id_bidang)->max('status');
        bidang_log::create([
            'id_bidang' => $id_bidang,
            'id_user' => $id_user,
            'log_type' => $log_type,
            'nama_bidang' => $nama_bidang,
            'status' => $status+1,
        ]);
    }

    public static function laboratorium_logs($id_laboratorium, $id_user, $log_type, $nama_lab, $alamat, $no_telp, $foto_lab)
    {
        $status = laboratorium_log::where('id_laboratorium', $id_laboratorium)->max('status');
        laboratorium_log::create([
            'id_laboratorium' => $id_laboratorium,
            'id_user' => $id_user,
            'log_type' => $log_type,
            'nama_lab' => $nama_lab,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'foto_lab' => $foto_lab,
            'status' => $status+1,
        ]);
    }

    public static function laboran_logs($id_laboran, $id_user, $log_type, $hak_akses)
    {
        $status = laboran_log::where('id_laboran', $id_laboran)->max('status');
        laboran_log::create([
            'id_laboran' => $id_laboran,
            'id_user' => $id_user,
            'log_type' => $log_type,
            'hak_akses' => $hak_akses,
            'status' => $status+1,
        ]);
    }

    public static function user_logs($id_user_data, $id_user, $log_type, $name, $email, $alamat, $no_hp)
    {
        $status = user_log::where('id_user_data', $id_user_data)->max('status');
        user_log::create([
            'id_user_data' => $id_user_data,
            'id_user' => $id_user,
            'log_type' => $log_type,
            'name' => $name,
            'email' => $email,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'status' => $status+1,
        ]);
    }
}
