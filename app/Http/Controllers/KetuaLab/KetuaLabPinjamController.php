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
        $eventoo = [];
        $menuSidebar = Utilities::sideBarMenu();
        $myLabID = Utilities::getMyLab();
        $myBidangID = tb_bidang::whereIn('id_laboratorium', $myLabID)->pluck('id_bidang');
        $myLayananID = tb_layanan::whereIn('id_bidang', $myBidangID)->pluck('id_layanan');
        $data = tb_peminjaman::whereIn('id_layanan', $myLayananID)->with('relasiPeminjamanToLayanan', 'relasiPeminjamanToUser')->get();
        $color = '';
        foreach ($data as $dt) {

            if ($dt->keterangan == 1) {
                $color = '#FF993C';
            } elseif ($dt->keterangan == 2) {
                $color = '#0f3bc0';
            } elseif ($dt->keterangan == 3) {
                $color = '#ff3b7d';
            } elseif ($dt->keterangan == 4) {
                $color = '#ffff00';
            } elseif ($dt->keterangan == 5) {
                $color = '#8800ff';
            } elseif ($dt->keterangan == 6) {
                $color = '#3cff00';
            } elseif ($dt->keterangan == null) {
                $color = '#b8d8be';
            }
            if ($dt->tgl_selesai == null) {
                $tgl = null;
            } else {
                $tgl = date('Y-m-d', strtotime(Carbon::parse($dt->tgl_selesai)->addDays(1)));
            }
            $eventoo[] = [
                'id' => $dt->id_peminjaman,
                'color' => $color,
                'title' => ucfirst(strtolower($dt->relasiPeminjamanToUser->name)) . ' - ' . $dt->relasiPeminjamanToLayanan->nama_layanan,
                'start' => $dt->tgl_pinjam,
                'end' => $tgl,
                'description' => $dt->relasiPeminjamanToLayanan->relasiLayananToBidang->relasiBidangToLaboratorium->nama_lab,
            ];
        }
        return view('KetuaLab.pinjam', compact('menuSidebar', 'eventoo'));
    }

    public function ajaxGetPeminjaman(Request $request)
    {
        if ($request->ajax()) {
            $data = tb_peminjaman::where('id_peminjaman', $request->id)->with('relasiPeminjamanToLayanan', 'relasiPeminjamanToUser')->first();
            if ($data) {
                $send[] = [
                    'nama_layanan' => $data->relasiPeminjamanToLayanan->nama_layanan,
                    'laboratorium' => $data->relasiPeminjamanToLayanan->relasiLayananToBidang->relasiBidangToLaboratorium->nama_lab,
                    'tanggal_order' => $data->tgl_order,
                    'jumlah' => $data->jumlah,
                    'satuan' => $data->satuan,
                    'harga' => $data->total_harga,
                    'peminjam' => $data->relasiPeminjamanToUser->name,
                    'start' => $data->tgl_pinjam,
                    'end' => $data->tgl_selesai,
                ];
                return response()->json($send);
            }
        }
    }
}
