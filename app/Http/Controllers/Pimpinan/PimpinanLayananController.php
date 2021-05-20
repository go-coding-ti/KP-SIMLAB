<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\tb_bidang;
use App\tb_layanan;
use Illuminate\Http\Request;

class PimpinanLayananController extends Controller
{
    public function index($id)
    {
        $getBidang = tb_bidang::where('id_bidang', $id)->first();
        $getLayanan = tb_layanan::where('id_bidang', $id)->get();
        return view('PimpinanLab.layanan', compact('getBidang', 'getLayanan'));
    }

    public function terimaNonaktif(Request $request)
    {
        $getLayanan = tb_layanan::where('id_layanan', $request->id_layanan)->where('status', 1)->where('status_aktif', 3)->first();
        if ($getLayanan) {
            $getLayanan->status_aktif = 0;
            $getLayanan->keterangan_aktif = null;
            $getLayanan->save();
            return redirect()->back()->with('success', 'Layanan telah diaktifkan!!');
        }
        return redirect()->back()->with('error', 'Layanan tidak ditemukan!!');
    }

    public function tolakNonaktif(Request $request)
    {
        $getLayanan = tb_layanan::where('id_layanan', $request->id_layanan)->where('status', 1)->where('status_aktif', 3)->first();
        if ($getLayanan) {
            $getLayanan->status_aktif = 1;
            $getLayanan->keterangan_aktif = $request->keterangan_aktif;
            $getLayanan->save();
            return redirect()->back()->with('success', 'Layanan telah ditolak!!');
        }
        return redirect()->back()->with('error', 'Layanan tidak ditemukan!!');
    }

    public function terimaAktif(Request $request)
    {
        $getLayanan = tb_layanan::where('id_layanan', $request->id_layanan)->where('status', 1)->where('status_aktif', 2)->first();
        if ($getLayanan) {
            $getLayanan->status_aktif = 1;
            $getLayanan->keterangan_aktif = null;
            $getLayanan->save();
            return redirect()->back()->with('success', 'Layanan telah diaktifkan!!');
        }
        return redirect()->back()->with('error', 'Layanan tidak ditemukan!!');
    }

    public function tolakAktif(Request $request)
    {
        $getLayanan = tb_layanan::where('id_layanan', $request->id_layanan)->where('status', 1)->where('status_aktif', 2)->first();
        if ($getLayanan) {
            $getLayanan->status_aktif = 0;
            $getLayanan->keterangan_aktif = $request->keterangan_aktif;
            $getLayanan->save();
            return redirect()->back()->with('success', 'Layanan telah ditolak!!');
        }
        return redirect()->back()->with('error', 'Layanan tidak ditemukan!!');
    }

    public function selfAktif(Request $request)
    {
        $getLayanan = tb_layanan::where('id_layanan', $request->id_layanan)->where('status', 1)->where('status_aktif', 0)->first();
        if ($getLayanan) {
            $getLayanan->status_aktif = 1;
            $getLayanan->keterangan_aktif = null;
            $getLayanan->save();
            return redirect()->back()->with('success', 'Layanan telah diaktifkan!!');
        }
        return redirect()->back()->with('error', 'Layanan tidak ditemukan!!');
    }

    public function selfNonaktif(Request $request)
    {
        $getLayanan = tb_layanan::where('id_layanan', $request->id_layanan)->where('status', 1)->where('status_aktif', 1)->first();
        if ($getLayanan) {
            $getLayanan->status_aktif = 0;
            $getLayanan->keterangan_aktif = $request->keterangan_aktif;
            $getLayanan->save();
            return redirect()->back()->with('success', 'Layanan telah dinonaktifkan!!');
        }
        return redirect()->back()->with('error', 'Layanan tidak ditemukan!!');
    }

}
