<?php

namespace App\Http\Controllers\KetuaLab;

use App\Http\Controllers\Controller;
use App\tb_bidang;
use App\tb_laboran;
use App\tb_layanan;
use App\tb_peminjaman;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KetuaLabReportController extends Controller
{
    public function index($id){
        $check = tb_laboran::where('id_laboratorium',$id)->where('id_user',Auth::user()->id)->where('hak_akses','kepala lab')->first();
        if($check){
            $menuSidebar = Utilities::sideBarMenu();
            $labData = Utilities::getLab($id);
            $arrayData = $this->lab($id);
            $perbulangrafik = tb_peminjaman::selectRaw('sum(total_harga) as total, month(tgl_order) as month')->whereIn('id_layanan',$arrayData)->where('keterangan','2')->groupBy('month')->orderByRaw('DATE_FORMAT(month,"%m")')->get();
            $laporanTabel = tb_peminjaman::selectRaw('count(*) as jumlah, sum(total_harga) as sub_total, year(tgl_order) as year, month(tgl_order) as month')->groupBy('year','month')->whereIn('id_layanan',$arrayData)->where('keterangan','2')->orderBy('year','ASC')->get();

            $laporan = tb_peminjaman::selectRaw('count(*) as jumlah, sum(total_harga) as sub_total, month(tgl_order) as month')->groupBy('month')->whereIn('id_layanan',$arrayData)->where('keterangan','2')->orderBy('month','DESC')->get();
            $tahunan = tb_peminjaman::selectRaw('count(*) as jumlah, sum(total_harga) as sub_total, year(tgl_order) as year')->groupBy('year')->whereIn('id_layanan',$arrayData)->where('keterangan','2')->orderBy('year','DESC')->get();

            $totalCount = tb_peminjaman::whereIn('id_layanan',$arrayData)->where('keterangan','2')->count();
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
            return view('KetuaLab.reportLab',compact('menuSidebar','json_total','json_bulan','totalBulanan','totalTahunan','totalCount','laporanTabel','labData'));
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
