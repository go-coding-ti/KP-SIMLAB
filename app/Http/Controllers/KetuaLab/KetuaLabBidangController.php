<?php

namespace App\Http\Controllers\KetuaLab;

use App\Http\Controllers\Controller;
use App\tb_bidang;
use Illuminate\Http\Request;

class KetuaLabBidangController extends Controller
{
    public function index($id){
        $menuSidebar = Utilities::sideBarMenu();
        $getBidang = tb_bidang::where('id_laboratorium',$id)->get();
        return view('KetuaLab.bidang',compact('menuSidebar','getBidang'));
    }

    public function terima(Request $request){
        $getBidang = tb_bidang::where('id_bidang',$request->id_bidang)->where('nama_bidang',$request->nama_bidang)->firstOrFail();
        $getBidang->status=1;
        $getBidang->save();
        return redirect()->back();
    }

    public function tolak(Request $request){
        $getBidang = tb_bidang::where('id_bidang',$request->id_bidang)->where('nama_bidang',$request->nama_bidang)->firstOrFail();
        $getBidang->status=2;
        $getBidang->save();
        return redirect()->back();
    }
}
