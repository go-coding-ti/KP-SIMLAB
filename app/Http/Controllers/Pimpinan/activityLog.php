<?php

namespace App\Http\Controllers\Pimpinan;

use App\berita_log;
use App\bidang_log;
use App\Http\Controllers\Controller;
use App\laboran_log;
use App\laboratorium_log;
use App\layanan_log;
use App\tb_berita;
use App\tb_bidang;
use App\tb_layanan;
use Illuminate\Http\Request;

class activityLog extends Controller
{
    //Berita
    public function logBerita(Request $request){
        $idLab = PimpinanUtilites::MyLabID($request->id);
        $idBerita = tb_berita::whereIn('id_laboratorium',$idLab)->pluck('id_berita');
        $logData = berita_log::whereIn('id_berita',$idBerita)->with('relasiBerita','relasiUser')->orderBy('created_at', 'DESC')->get();
        return response()->json($logData);
    }

    public function viewLogBerita(Request $request){
        $logData = berita_log::where('id',$request->id)->with('relasiBerita','relasiUser')->get();
        return response()->json($logData);
    }

    //Bidang
    public function logBidang(Request $request){
        $idLab = PimpinanUtilites::MyLabID($request->id);
        $idBidang = tb_bidang::whereIn('id_laboratorium',$idLab)->pluck('id_bidang');
        $logData = bidang_log::whereIn('id_bidang',$idBidang)->with('relasiBidang','relasiUser')->orderBy('created_at', 'DESC')->get();
        return response()->json($logData);
    }

    public function viewLogBidang(Request $request){
        $logData = bidang_log::where('id',$request->id)->with('relasiBidang','relasiUser')->get();
        return response()->json($logData);
    }

    //Lab
    public function logLaboratorium(Request $request){
        $idLab = PimpinanUtilites::MyLabID($request->id);
        $logData = laboratorium_log::whereIn('id_laboratorium',$idLab)->with('relasiLaboratorium','relasiUser')->orderBy('created_at', 'DESC')->get();
        return response()->json($logData);
    }

    public function viewLogLaboratorium(Request $request){
        $logData = laboratorium_log::where('id',$request->id)->with('relasiLaboratorium','relasiUser')->get();
        return response()->json($logData);
    }

    //Layanan
    public function logLayanan(Request $request){
        $idLab = PimpinanUtilites::MyLabID($request->id);
        $idBidang = tb_bidang::whereIn('id_laboratorium',$idLab)->pluck('id_bidang');
        $idLayanan = tb_layanan::whereIn('id_bidang',$idBidang)->pluck('id_layanan');
        $logData = layanan_log::whereIn('id_layanan',$idLayanan)->with('relasiLayanan','relasiUser')->orderBy('created_at', 'DESC')->get();
        return response()->json($logData);
    }

    public function viewLogLayanan(Request $request){
        $logData = layanan_log::where('id',$request->id)->with('relasiLayanan','relasiUser')->get();
        return response()->json($logData);
    }

}
