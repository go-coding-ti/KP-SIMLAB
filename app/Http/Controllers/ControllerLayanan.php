<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_layanan;
use App\tb_bidang;

class ControllerLayanan extends Controller
{
    public function readLayanan(){
    $layanan = tb_layanan::with('bidang')->get();
    $bidangs = tb_bidang::all();
    return view('admin\layananadmin',compact('layanan','bidangs'));
    }

    public function createLayanan(Request $request)
    {
    	tb_layanan::create([
    	    'nama_layanan'=>$request->nama_layanan,
            'satuan'=>$request->satuan,
            'harga'=>$request->harga,
            'id_bidang'=>$request->id_bidang,
            'keterangan'=>$request->keterangan,
            ]);
    	return redirect('/layananadmin')->with('success','Data berhasil disimpan!');
    }

    public function deleteLayanan($id){
        $deleteItem = tb_layanan::find($id);
        $deleteItem->delete();
        return redirect('/layananadmin')->with('success','Data berhasil dihapus!');
    }

    public function updateLayanan(Request $request){
        $updateItem = tb_layanan::find($request->id_layanan);
        $updateItem->nama_layanan = $request->nama_layanan;
        $updateItem->satuan = $request->satuan;
        $updateItem->harga = $request->harga;
        $updateItem->id_bidang = $request->id_bidang;
        $updateItem->keterangan = $request->keterangan;
        $updateItem->save();
        return redirect('/layananadmin')->with('success','Data berhasil diupdate!');
    }
}
