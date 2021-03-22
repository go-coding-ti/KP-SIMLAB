<?php

namespace App\Http\Controllers\KetuaLab;

use App\Http\Controllers\Controller;
use App\tb_bidang;
use App\tb_laboran;
use App\tb_laboratorium;
use App\tb_layanan;
use App\tb_peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KetuaLabPeminjamanController extends Controller
{
    public function index($id){
        $check = tb_laboran::where('id_laboratorium',$id)->where('id_user',Auth::user()->id)->where('hak_akses','kepala lab')->first();
        if($check){
            $menuSidebar = Utilities::sideBarMenu();
            $data = tb_bidang::where('id_laboratorium',$id)->get();
            $arrayData = array();
            for ($i = 0; $i<count($data);$i++){
                $arrayData[] = $data[$i]['id_bidang'];
            }
            $data = tb_layanan::whereIn('id_bidang',$arrayData)->get();
            for ($i = 0; $i<count($data);$i++){
                $arrayData[] = $data[$i]['id_layanan'];
            }
            $lab = tb_laboratorium::where('id_laboratorium',$id)->first();
            $data = tb_peminjaman::whereIn('id_layanan',$arrayData)->with('relasiPeminjamanToLayanan','relasiPeminjamanToUser')->get();
            return view('KetuaLab.peminjaman',compact('menuSidebar','data','lab'));
        } return redirect()->back();
    }

    public function approval($id){
        $approvalData = tb_peminjaman::find($id);
        $approvalData->keterangan=2;
        $approvalData->save();
        return redirect()->back();
    }

    public function refuse(Request $request){
        $refuseData = tb_peminjaman::find($request->id_peminjaman);
        $refuseData->keterangan=3;
        $refuseData->alasan=$request->alasan;
        $refuseData->save();
        return redirect()->back();
    }
}
