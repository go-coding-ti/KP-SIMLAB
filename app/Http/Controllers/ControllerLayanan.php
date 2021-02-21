<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_layanan;

class ControllerLayanan extends Controller
{
    public function readLayanan(){
    $layanan = tb_layanan::all();
    return view('admin\layananadmin',compact('layanan'));
    }

    public function createLayanan(Request $request)
    {
        $layanan = new tb_layanan;
        $layanan->nama_layanan = $request->nama_layanan;
        $layanan->unit_satuan = $request->unit_satuan;
        $layanan->satuan = $request->satuan;
        $layanan->id_bidang = $request->id_bidang;
        $layanan->keterangan = $request->keterangan;
        $couriers->save();
        return Redirect::to('\layananadmin')->with(['success' => 'Berhasil Menambah Kurir']);
    }
}
