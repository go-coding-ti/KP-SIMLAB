<?php

namespace App\Http\Controllers\Pimpinan;

use App\berita_log;
use App\bidang_log;
use App\Http\Controllers\Controller;
use App\Http\Controllers\logs_class;
use App\Http\Controllers\Pimpinan\PimpinanUtilites;
use App\laboratorium_log;
use App\layanan_log;
use App\tb_berita;
use App\tb_bidang;
use App\tb_layanan;
use App\tb_peminjaman;
use App\users;
use DateTime;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PimpinanLabController extends Controller
{
    public function calendar(Request $request)
    {
        $myLabID = PimpinanUtilites::getMyLabID();
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
        return view('PimpinanLab.peminjamanCalendar', compact('eventoo'));
    }

    public function profile()
    {
        $data = Auth::user();
        return view('PimpinanLab.profile',compact('data'));
    }

    public function editProfile(Request $request)
    {
        $user = users::find(Auth::id());
        if(Hash::check($request->password, $user->password)){
            $user->name = $request->name;
            $user->alamat = $request->alamat;
            $user->no_hp = $request->no_hp;
            $user->save();
            return redirect(route('profilePimpinan'))->with('success','Profile anda berhasil diupdate!!');
        }
        return redirect()->back()->withInput()->with('error','Password yang anda masukan salah!!');
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

    public function index(){
        $user = users::find(Auth::user()->id);
        $myLayanan = $this->allMyLayanan(PimpinanUtilites::getMyLabID());
        $perbulanGrafik = tb_peminjaman::selectRaw('sum(total_harga) as total, month(tgl_order) as month')->whereIn('id_layanan', $myLayanan)->whereBetween('tgl_order',[Carbon::now()->startOfYear(), Carbon::now()])->where('keterangan', '2')->groupBy('month')->orderByRaw('DATE_FORMAT(month,"%m")')->get();
        $laporanTabel = tb_peminjaman::selectRaw('count(*) as jumlah, sum(total_harga) as sub_total, year(tgl_order) as year, month(tgl_order) as month ')->whereIn('id_layanan', $myLayanan)->where('keterangan', '2')->groupBy('year','month')->orderBy('year', 'ASC')->get();

        $laporan = tb_peminjaman::selectRaw('count(*) as jumlah, sum(total_harga) as sub_total, month(tgl_order) as month')->whereIn('id_layanan', $myLayanan)->where('keterangan', '2')->whereYear('tgl_order',[Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->groupBy('month')->orderBy('month', 'DESC')->get();
        $tahunan = tb_peminjaman::selectRaw('count(*) as jumlah, sum(total_harga) as sub_total, year(tgl_order) as year')->whereIn('id_layanan', $myLayanan)->where('keterangan', '2')->whereYear('tgl_order',[Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->groupBy('year')->orderBy('year', 'DESC')->get();
        $piechart = tb_peminjaman::selectRaw('keterangan as ket, count(*) as jumlah')->whereIn('id_layanan', $myLayanan)->whereYear('tgl_order',[Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->groupBy('ket')->orderBy('ket')->get();

        if(count($piechart)>0){
            $json_pie_jumlah_transaksi = [];
            $json_pie_keterangan = [];
            foreach ($piechart as $pie){
                $json_pie_jumlah_transaksi[] = $pie->jumlah;
                if($pie->ket==1){
                    $json_pie_keterangan[0] = 'Menunggu Konfirmasi';
                    $json_pie_jumlah_transaksi[0] = $pie->jumlah;
                } elseif ($pie->ket==2){
                    $json_pie_keterangan[1] = 'Transaksi Diterima';
                    $json_pie_jumlah_transaksi[1] = $pie->jumlah;
                } elseif ($pie->ket==3){
                    $json_pie_keterangan[2] = 'Transaksi Ditolak';
                    $json_pie_jumlah_transaksi[2] = $pie->jumlah;
                }

            }
        }

        $transactionThisYear = tb_peminjaman::whereIn('id_layanan', $myLayanan)->where('keterangan', '2')->whereYear('tgl_order',Carbon::now()->year)->count();
        $transactionThisMonth = tb_peminjaman::whereIn('id_layanan', $myLayanan)->where('keterangan', '2')->whereMonth('tgl_order',Carbon::now()->month)->count();

        $json_total = [];
        $json_bulan = [];
        $totalBulanan = 0;
        $totalTahunan = 0;

        foreach ($perbulanGrafik as $grafik) {
            $json_total[] = $grafik->total;
            $dateobj = DateTime::createFromFormat('!m', $grafik->month);
            $monthname = $dateobj->format('F');
            $json_bulan[] = $monthname;
        }

        if(count($laporan)>0){
            foreach ($laporan as $pelaporan) {
                $totalBulanan = $totalBulanan + $pelaporan->sub_total;
            }
            $totalBulanan = $totalBulanan / Carbon::now()->month;
        }

        if(count($tahunan)>0){
            foreach ($tahunan as $pelaporantahunan) {
                $totalTahunan = $totalTahunan + $pelaporantahunan->sub_total;
            }
            $totalTahunan = $totalTahunan / count($tahunan);
        }

        return view('PimpinanLab.dashboard', compact('user', 'json_total', 'json_bulan', 'totalBulanan', 'totalTahunan', 'transactionThisYear','transactionThisMonth', 'laporanTabel','json_pie_keterangan','json_pie_jumlah_transaksi'));
    }

    public function allMyLayanan($id)
    {
        $data = tb_bidang::whereIn('id_laboratorium', $id)->pluck('id_bidang');
        $id_layanan = tb_layanan::whereIn('id_bidang',$data)->pluck('id_layanan');
        return $id_layanan;
    }

    //AJAX All Berita
    public function logBerita(Request $request){
        $idLab = PimpinanUtilites::MyLabID($request->id);
        $idBerita = tb_berita::whereIn('id_laboratorium',$idLab)->pluck('id_berita');
        $logData = berita_log::whereIn('id_berita',$idBerita)->with('relasiBerita','relasiUser')->orderBy('created_at', 'DESC')->get();
        return response()->json($logData);
    }

    //AJAX VIEW SATU BERITA
    public function viewLogBerita(Request $request){
        $logData = berita_log::where('id',$request->id)->with('relasiBerita','relasiUser')->get();
        return response()->json($logData);
    }

    //AJAX All Bidang
    public function logBidang(Request $request){
        $idLab = PimpinanUtilites::MyLabID($request->id);
        $idBidang = tb_bidang::whereIn('id_laboratorium',$idLab)->pluck('id_berita');
        $logData = bidang_log::whereIn('id_bidang',$idBidang)->with('relasiBidang','relasiUser')->orderBy('created_at', 'DESC')->get();
        return response()->json($logData);
    }

    //AJAX VIEW SATU BIDANG
    public function viewLogBidang(Request $request){
        $logData = bidang_log::where('id',$request->id)->with('relasiBidang','relasiUser')->get();
        return response()->json($logData);
    }

    //AJAX All Laboratorium
    public function logLaboratorium(Request $request){
        $idLab = PimpinanUtilites::MyLabID($request->id);
        $logData = laboratorium_log::whereIn('id_laboratorium',$idBidang)->with('relasiLaboratorium','relasiUser')->orderBy('created_at', 'DESC')->get();
        return response()->json($logData);
    }

    //AJAX VIEW SATU LABORATORIUM
    public function viewLogLaboratorium(Request $request){
        $logData = laboratorium_log::where('id',$request->id)->with('relasiLaboratorium','relasiUser')->get();
        return response()->json($logData);
    }

    //AJAX All Layanan
    public function logLayanan(Request $request){
        $idLab = PimpinanUtilites::MyLabID($request->id);
        $idBidang = tb_bidang::whereIn('id_laboratorium',$idLab)->pluck('id');
        $idLayanan = tb_layanan::whereIn('id_bidang',$idBidang)->pluck('id');
        $logData = layanan_log::whereIn('id_layanan',$idLayanan)->with('relasiLayanan','relasiUser')->orderBy('created_at', 'DESC')->get();
        return response()->json($logData);
    }

    //AJAX VIEW SATU Layanan
    public function viewLogLayanan(Request $request){
        $logData = layanan_log::where('id',$request->id)->with('relasiLayanan','relasiUser')->get();
        return response()->json($logData);
    }
}
