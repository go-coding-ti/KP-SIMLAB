<?php

namespace App\Http\Controllers\KetuaLab;

use App\Http\Controllers\Controller;
use App\tb_bidang;
use App\tb_layanan;
use Illuminate\Http\Request;

class KetuaLabLayananController extends Controller
{
    public function index($id, $bidang){
        $menuSidebar = Utilities::sideBarMenu();
        $getBidang = tb_bidang::where('id_bidang',$id)->where('nama_bidang',$bidang)->first();
        $getLayanan = tb_layanan::where('id_bidang',$getBidang->id_bidang)->get();
        return view('KetuaLab.layanan',compact('menuSidebar','getBidang','getLayanan'));
    }

    public function terima(Request $request){
        $getLayanan = tb_layanan::where('id_layanan',$request->id_layanan)->where('nama_layanan',$request->nama_layanan)->firstOrFail();
        $getLayanan->status=1;
        $getLayanan->save();
        return redirect()->back();
    }

    public function tolak(Request $request){
        $getLayanan = tb_layanan::where('id_layanan',$request->id_layanan)->where('nama_layanan',$request->nama_layanan)->firstOrFail();
        $getLayanan->status=2;
        $getLayanan->save();
        return redirect()->back();
    }
}
