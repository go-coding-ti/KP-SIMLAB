<?php

namespace App\Http\Controllers\KetuaLab;

use App\Http\Controllers\Controller;
use App\tb_bidang;
use App\tb_laboran;
use App\tb_layanan;
use App\tb_peminjaman;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class KetuaLabReportController extends Controller
{
    public function index($id){
        $check = tb_laboran::where('id_laboratorium',$id)->where('id_user',Auth::user()->id)->where('hak_akses','kepala lab')->first();
        if($check){
            $menuSidebar = Utilities::sideBarMenu();
            $labData = Utilities::getLab($id);
            $arrayData = $this->lab($id);
            $perbulangrafik = tb_peminjaman::selectRaw('sum(total_harga) as total, month(tgl_order) as month')->whereIn('id_layanan', $arrayData)->whereBetween('tgl_order',[Carbon::now()->startOfYear(), Carbon::now()])->where('keterangan', '2')->groupBy('month')->orderByRaw('DATE_FORMAT(month,"%m")')->get();
            $laporanTabel = tb_peminjaman::selectRaw('count(*) as jumlah, sum(total_harga) as sub_total, year(tgl_order) as year, month(tgl_order) as month')->groupBy('year','month')->whereIn('id_layanan',$arrayData)->where('keterangan','2')->orderBy('year','ASC')->get();

            $laporan = tb_peminjaman::selectRaw('count(*) as jumlah, sum(total_harga) as sub_total, month(tgl_order) as month')->whereIn('id_layanan', $arrayData)->where('keterangan', '2')->whereYear('tgl_order',[Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->groupBy('month')->orderBy('month', 'DESC')->get();
            $tahunan = tb_peminjaman::selectRaw('count(*) as jumlah, sum(total_harga) as sub_total, year(tgl_order) as year')->whereIn('id_layanan', $arrayData)->where('keterangan', '2')->whereYear('tgl_order',[Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->groupBy('year')->orderBy('year', 'DESC')->get();
            $piechart = tb_peminjaman::selectRaw('keterangan as ket, count(*) as jumlah')->whereIn('id_layanan', $arrayData)->whereYear('tgl_order',[Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->groupBy('ket')->orderBy('ket')->get();

            if(count($piechart)>0){
                $json_pie_jumlah_transaksi = [];
                $json_pie_keterangan = [];
                $json_pie_keterangan[0] = 'Menunggu Konfirmasi';
                $json_pie_keterangan[1] = 'Transaksi Diterima';
                $json_pie_keterangan[2] = 'Transaksi Ditolak';
                $json_pie_jumlah_transaksi[0] = 0;
                $json_pie_jumlah_transaksi[1] = 0;
                $json_pie_jumlah_transaksi[2] = 0;
                foreach ($piechart as $pie){
                    if($pie->ket==1){
                        $json_pie_jumlah_transaksi[0] = $pie->jumlah;
                    } elseif ($pie->ket==2){
                        $json_pie_jumlah_transaksi[1] = $pie->jumlah;
                    } elseif ($pie->ket==3){
                        $json_pie_jumlah_transaksi[2] = $pie->jumlah;
                    }
                }
            }

            $transactionThisYear = tb_peminjaman::whereIn('id_layanan', $arrayData)->where('keterangan', '2')->whereYear('tgl_order',Carbon::now()->year)->count();
            $transactionThisMonth = tb_peminjaman::whereIn('id_layanan', $arrayData)->where('keterangan', '2')->whereMonth('tgl_order',Carbon::now()->month)->count();

            $json_total = [];
            $json_bulan = [];
            $totalBulanan = 0;
            $totalTahunan = 0;
            foreach($perbulangrafik as $grafik){
                $json_total[] = $grafik->total;
                $dateobj = DateTime::createFromFormat('!m',$grafik->month);
                $monthname = $dateobj->format('F');
                $json_bulan[] = $monthname;
            }
            if(count($laporan) > 0){
                foreach ($laporan as $pelaporan){
                    $totalBulanan = $totalBulanan+$pelaporan->sub_total;
                }
                $totalBulanan = $totalBulanan/count($laporan);
            }
            if(count($tahunan) > 0){
                foreach ($tahunan as $pelaporantahunan){
                    $totalTahunan = $totalTahunan+$pelaporantahunan->sub_total;
                }
                $totalTahunan = $totalTahunan/count($tahunan);
            }
            return view('KetuaLab.reportLab',compact('menuSidebar','json_total','json_bulan','totalBulanan','totalTahunan','transactionThisYear','transactionThisMonth','json_pie_jumlah_transaksi','json_pie_keterangan','laporanTabel','labData'));
        } return redirect()->back();
    }

    public function lab($id){
        $data = tb_bidang::where('id_laboratorium',$id)->get();
        $arrayData1 = array();
        $arrayData = array();
        for ($i = 0; $i<count($data);$i++){
            $arrayData[] = $data[$i]['id_bidang'];
        }
        $data = tb_layanan::whereIn('id_bidang',$arrayData)->get();
        for ($i = 0; $i<count($data);$i++){
            $arrayData1[] = $data[$i]['id_layanan'];
        }
        return $arrayData1;
    }
}
