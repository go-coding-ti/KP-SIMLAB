<?php

namespace App\Http\Controllers\KetuaLab;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pimpinan\PimpinanUtilites;
use App\tb_bidang;
use App\tb_layanan;
use App\tb_peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class KetuaLabPinjamController extends Controller
{
    public function calendar(Request $request)
    {
        $menuSidebar = Utilities::sideBarMenu();
        $myLabID = Utilities::getMyLab();
        $myBidangID = tb_bidang::whereIn('id_laboratorium',$myLabID)->pluck('id_bidang');
        $myLayananID = tb_layanan::whereIn('id_bidang',$myBidangID)->pluck('id_layanan');
        $data = tb_peminjaman::whereIn('id_layanan',$myLayananID)->where('keterangan',2)->with('relasiPeminjamanToLayanan','relasiPeminjamanToUser')->get();
        foreach ($data as $dt) {
            $eventoo[] = [
                'id'=>$dt->id_peminjaman,
                'title' => ucfirst(strtolower($dt->relasiPeminjamanToUser->name)).' - '.$dt->relasiPeminjamanToLayanan->nama_layanan,
                'start' => $dt->tgl_pinjam,
                'end' => date('Y-m-d', strtotime(Carbon::parse($dt->tgl_selesai)->addDays(1))),
                'description' => $dt->relasiPeminjamanToLayanan->relasiLayananToBidang->relasiBidangToLaboratorium->nama_lab,
            ];
        }
        return view('KetuaLab.pinjam', compact('menuSidebar','eventoo'));
    }

    public function ajaxGetPeminjaman(Request $request){
        if ($request->ajax()){
            $data = tb_peminjaman::where('id_peminjaman',$request->id)->with('relasiPeminjamanToLayanan','relasiPeminjamanToUser')->first();
            if($data){
                $send[] = [
                    'nama_layanan'=>$data->relasiPeminjamanToLayanan->nama_layanan,
                    'laboratorium'=>$data->relasiPeminjamanToLayanan->relasiLayananToBidang->relasiBidangToLaboratorium->nama_lab,
                    'tanggal_order'=>$data->tgl_order,
                    'jumlah'=>$data->jumlah,
                    'satuan'=>$data->satuan,
                    'harga'=>$data->total_harga,
                    'peminjam'=>$data->relasiPeminjamanToUser->name,
                    'start' => $data->tgl_pinjam,
                    'end' => $data->tgl_selesai,
                ];
                return response()->json($send);
            }
        }
    }
}
