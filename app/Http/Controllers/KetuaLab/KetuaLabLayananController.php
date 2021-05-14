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
        $getLayanan = tb_layanan::where('id_bidang',$getBidang->id_bidang)->with('relasiLayananToBidang')->get();
        return view('KetuaLab.layanan',compact('menuSidebar','getBidang','getLayanan'));
    }

    public function terima(Request $request){
        $getLayanan = tb_layanan::where('id_layanan',$request->id_layanan)->where('nama_layanan',$request->nama_layanan)->firstOrFail();
        $getLayanan->status=1;
        $getLayanan->save();
        return redirect()->back()->with('success','Permohonan telah diterima!!');
    }

    public function tolak(Request $request){
        $getLayanan = tb_layanan::where('id_layanan',$request->id_layanan)->where('nama_layanan',$request->nama_layanan)->firstOrFail();
        $getLayanan->status=2;
        $getLayanan->save();
        return redirect()->back()->with('success','Permohonan ditolak!!');
    }

    public function aktifkan(Request $request)
    {
        $getLayanan = tb_layanan::where('id_layanan',$request->id_layanan)->where('nama_layanan',$request->nama_layanan)->where('status_aktif',0)->firstOrFail();
        $getLayanan->status_aktif=2;
        $getLayanan->save();
        return redirect()->back()->with('success','Permohonan telah diajukan!!');
    }

    public function nonaktifkan(Request $request)
    {
        $getLayanan = tb_layanan::where('id_layanan',$request->id_layanan)->where('nama_layanan',$request->nama_layanan)->where('status_aktif',1)->firstOrFail();
        $getLayanan->status_aktif=3;
        $getLayanan->save();
        return redirect()->back()->with('success','Permohonan telah diajukan!!');
    }

    public function penghapusan(Request $request){
        $getLayanan = tb_layanan::where('id_layanan',$request->id_layanan)->where('nama_layanan',$request->nama_layanan)->firstOrFail();
        $getLayanan->delete();
        return redirect()->back()->with('success','Layanan telah dihapus !!');
    }

    public function tolakPenghapusan(Request $request)
    {
        $getLayanan = tb_layanan::where('id_layanan',$request->id_layanan)->where('nama_layanan',$request->nama_layanan)->firstOrFail();
        $getLayanan->status=2;
        $getLayanan->save();
        return redirect()->back()->with('success','Pembatalan penghapusan layanan berhasil !!');
    }
}
