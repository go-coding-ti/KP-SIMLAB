<?php

namespace App\Http\Controllers;

use App\tb_laboratorium;
use Illuminate\Http\Request;
use App\tb_bidang;

class ControllerBidang extends Controller
{
    public function readbidang(){
        $bidang = tb_bidang::with('relasiBidangToLaboratorium')->get();
        $allLab = tb_laboratorium::all();
        return view('admin\bidangadmin',compact('bidang','allLab'));
    }

    public function createBidang(Request $request){
        tb_bidang::create([
            'nama_bidang'=>$request->nama_bidang,
            'id_laboratorium'=>$request->id_lab,
        ]);
        return redirect('/bidangadmin');
    }

    public function updateBidang(Request $request){
        $updateBidang = tb_bidang::find($request->id_bidang);
        $updateBidang->nama_bidang = $request->nama_bidang;
        $updateBidang->id_laboratorium = $request->id_lab;
        $updateBidang->save();
        return redirect('/bidangadmin');
    }

    public function deleteBidang($id){
        $deleteBidang = tb_bidang::find($id);
        $deleteBidang->delete();
        return redirect('/bidangadmin');
    }
}
