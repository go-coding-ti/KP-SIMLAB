<?php

namespace App\Http\Controllers\KetuaLab;

use App\Http\Controllers\Controller;
use App\tb_bidang;
use App\tb_laboran;
use App\tb_layanan;
use App\users;
use App\User;
use App\tb_peminjaman;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KetuaLabController extends Controller
{

    public function index()
    {
        
        $user = users::find(Auth::user()->id);
        $menuSidebar = Utilities::sideBarMenu();
        $myLayanan = $this->allMyLab(Utilities::getMyLab());
        $perbulanGrafik = tb_peminjaman::selectRaw('sum(total_harga) as total, month(tgl_order) as month')->whereIn('id_layanan', $myLayanan)->where('keterangan', '2')->groupBy('month')->orderByRaw('DATE_FORMAT(month,"%m")')->get();
        $laporanTabel = tb_peminjaman::selectRaw('count(*) as jumlah, sum(total_harga) as sub_total, year(tgl_order) as year, month(tgl_order) as month ')->whereIn('id_layanan', $myLayanan)->where('keterangan', '2')->groupBy('year','month')->orderBy('year', 'ASC')->get();

        $laporan = tb_peminjaman::selectRaw('count(*) as jumlah, sum(total_harga) as sub_total, month(tgl_order) as month')->whereIn('id_layanan', $myLayanan)->where('keterangan', '2')->groupBy('month')->orderBy('month', 'DESC')->get();
        $tahunan = tb_peminjaman::selectRaw('count(*) as jumlah, sum(total_harga) as sub_total, year(tgl_order) as year')->whereIn('id_layanan', $myLayanan)->where('keterangan', '2')->groupBy('year')->orderBy('year', 'DESC')->get();

        $totalCount = tb_peminjaman::whereIn('id_layanan', $myLayanan)->where('keterangan', '2')->count();

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
            $totalBulanan = $totalBulanan / count($laporan);
        }

        if(count($tahunan)>0){
            foreach ($tahunan as $pelaporantahunan) {
                $totalTahunan = $totalTahunan + $pelaporantahunan->sub_total;
            }
            $totalTahunan = $totalTahunan / count($tahunan);
        }

        return view('KetuaLab.dashboard', compact('user','menuSidebar', 'json_total', 'json_bulan', 'totalBulanan', 'totalTahunan', 'totalCount', 'laporanTabel'));
    }

    public function allMyLab($id)
    {
        $data = tb_bidang::whereIn('id_laboratorium', $id)->get();

        $arrayData1 = array();
        $arrayData = array();

        for ($i = 0; $i < count($data); $i++) {
            $arrayData[] = $data[$i]['id_bidang'];
        }

        $data = tb_layanan::whereIn('id_bidang', $arrayData)->get();

        for ($i = 0; $i < count($data); $i++) {
            $arrayData1[] = $data[$i]['id_layanan'];
        }
        return $arrayData1;
    }
    
    public function readNotif($id){
        $user = User::find($id);
        $user->unreadNotifications->markAsRead();
    }
}
